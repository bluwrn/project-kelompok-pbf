<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function dashboard()
    {
        $criticalDays = (int) Setting::getValue('critical_days', 30);
        $nearDays = (int) Setting::getValue('near_days', 60);

        $contracts = Contract::latest()->get();

        $today = now()->startOfDay();

        $totalContracts = Contract::count();

        $activeContracts = Contract::whereDate(
            'tanggal_berakhir',
            '>=',
            $today
        )->count();

        $expiringThisMonth = Contract::whereBetween(
            'tanggal_berakhir',
            [
                now()->startOfMonth(),
                now()->endOfMonth()
            ]
        )->count();

        $expiredContracts = Contract::whereDate(
            'tanggal_berakhir',
            '<',
            $today
        )->count();

        $totalValue = Contract::sum('nilai_kontrak');

        $categoryStats = Contract::selectRaw('kategori, count(*) as count')
            ->groupBy('kategori')
            ->pluck('count', 'kategori')
            ->toArray();

        $currentYear = now()->year;
        $months = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agu',
            9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
        ];
        $monthlyOmset = array_fill_keys(array_values($months), 0);

        $monthlyData = Contract::whereYear('tanggal_mulai', $currentYear)
            ->selectRaw('MONTH(tanggal_mulai) as month, SUM(nilai_kontrak) as total')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        foreach ($monthlyData as $m => $total) {
            if (isset($months[$m])) {
                $monthlyOmset[$months[$m]] = (float) $total;
            }
        }

        $categoryOmset = Contract::selectRaw('kategori, SUM(nilai_kontrak) as total')
            ->groupBy('kategori')
            ->pluck('total', 'kategori')
            ->map(fn($val) => (float) $val)
            ->toArray();

        $user = Auth::user();

        return view('dashboard', compact(
            'contracts',
            'totalContracts',
            'activeContracts',
            'expiringThisMonth',
            'expiredContracts',
            'totalValue',
            'criticalDays',
            'nearDays',
            'user',
            'categoryStats',
            'monthlyOmset',
            'categoryOmset'
        ));
    }

    public function index(Request $request)
    {
        $query = Contract::query();

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('kode', 'like', "%{$search}%")
                    ->orWhere('judul', 'like', "%{$search}%")
                    ->orWhere('pihak', 'like', "%{$search}%");

            });
        }

        if ($request->filled('kategori')) {
            $query->where(
                'kategori',
                $request->kategori
            );
        }

        if ($request->filled('status')) {
            $query->where(
                'status',
                $request->status
            );
        }

        $perPage = (int) $request->get('per_page', 10);
        if (!in_array($perPage, [5, 10, 25, 50, 100])) {
            $perPage = 10;
        }

        $contracts = $query
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view(
            'contracts.index',
            compact('contracts')
        );
    }

    public function create()
    {
        return view('contracts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'judul' => [
                'required',
                'string',
                'max:255'
            ],

            'kategori' => [
                'required',
                'in:Karyawan,Vendor,Sub-kontraktor,Klien'
            ],

            'pihak' => [
                'required',
                'string',
                'max:255'
            ],

            'penanggung_jawab' => [
                'required',
                'string',
                'max:255'
            ],

            'tanggal_mulai' => [
                'required',
                'date'
            ],

            'tanggal_berakhir' => [
                'required',
                'date',
                'after:tanggal_mulai'
            ],

            'nilai_kontrak' => [
                'required',
                'numeric',
                'min:0'
            ],

            'status' => [
                'required',
                'in:Draft,Review Internal,Review Eksternal,Revisi,Menunggu Tanda Tangan,Selesai Ditandatangani'
            ],

            'keterangan' => [
                'nullable',
                'string'
            ],
        ]);

        $validated['kode'] =
            'KTR-' .
            now()->format('YmdHis') .
            '-' .
            random_int(10, 99);

        Contract::create($validated);

        return redirect('/dashboard#tambah')
            ->with(
                'success',
                'Kontrak berhasil ditambahkan.'
            );
    }

    public function show(Contract $contract)
    {
        return view(
            'contracts.show',
            compact('contract')
        );
    }

    public function edit(Contract $contract)
    {
        return view(
            'contracts.edit',
            compact('contract')
        );
    }

    public function update(
        Request $request,
        Contract $contract
    ) {

        $validated = $request->validate([

            'judul' => [
                'required',
                'string',
                'max:255'
            ],

            'kategori' => [
                'required',
                'in:Karyawan,Vendor,Sub-kontraktor,Klien'
            ],

            'pihak' => [
                'required',
                'string',
                'max:255'
            ],

            'penanggung_jawab' => [
                'required',
                'string',
                'max:255'
            ],

            'tanggal_mulai' => [
                'required',
                'date'
            ],

            'tanggal_berakhir' => [
                'required',
                'date',
                'after:tanggal_mulai'
            ],

            'nilai_kontrak' => [
                'required',
                'numeric',
                'min:0'
            ],

            'status' => [
                'required',
                'in:Draft,Review Internal,Review Eksternal,Revisi,Menunggu Tanda Tangan,Selesai Ditandatangani'
            ],

            'keterangan' => [
                'nullable',
                'string'
            ],
        ]);

        $contract->update($validated);

        return redirect('/dashboard#daftar')
            ->with(
                'success',
                'Kontrak berhasil diperbarui.'
            );
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();

        return redirect('/dashboard#daftar')
            ->with(
                'success',
                'Kontrak berhasil dihapus.'
            );
    }

    public function updateReminderSettings(
        Request $request
    ) {

        $validated = $request->validate([

            'critical_days' => [
                'required',
                'integer',
                'min:1'
            ],

            'near_days' => [
                'required',
                'integer',
                'gt:critical_days'
            ],
        ]);

        Setting::setValue(
            'critical_days',
            $validated['critical_days']
        );

        Setting::setValue(
            'near_days',
            $validated['near_days']
        );

        return redirect('/dashboard#pengaturan')
            ->with(
                'success',
                'Pengaturan pengingat berhasil disimpan.'
            );
    }
}