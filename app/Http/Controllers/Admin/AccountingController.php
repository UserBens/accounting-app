<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\Cash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accountnumber;
use App\Models\Transaction_transfer;

class AccountingController extends Controller
{
    public function indexCash(Request $request)
    {
        session()->flash('page', (object)[
            'page' => 'Transaction',
            'child' => 'database Cash & Bank',
        ]);

        // try {
        //     $form = (object) [
        //         'sort' => $request->sort ? $request->sort : null,
        //         'order' => $request->order ? $request->order : null,
        //         'status' => $request->status ? $request->status : null,
        //         'search' => $request->search ? $request->search : null,
        //         'type' => $request->type ? $request->type :  null,
        //     ];

        //     // Query data dari model Transaction_transfer
        //     $transferdata = Transaction_transfer::query();

        //     // Filter data berdasarkan parameter yang diberikan
        //     if ($request->has('search')) {
        //         $transferdata->where('transfer', 'LIKE', '%' . $request->search . '%')
        //             ->orWhere('deposit', 'LIKE', '%' . $request->search . '%')
        //             ->orWhere('amount', 'LIKE', '%' . $request->search . '%')
        //             ->orWhere('description', 'LIKE', '%' . $request->search . '%');
        //     }

        //     // Lakukan pagination
        //     $transferdata = $transferdata->orderBy($form->order ?? 'created_at', $form->sort ?? 'desc')->paginate(10);

            // Return view dengan data yang diperlukan
            return view('components.cash&bank.index', [
                
            ]);
        // } catch (Exception $err) {
        //     return dd($err);
        // }
    }


    public function indexAccount(Request $request)
    {
        session()->flash('page', (object)[
            'page' => 'Transaction',
            'child' => 'database Account Number',
        ]);

        // try {
        //     $form = (object) [
        //         'sort' => $request->sort ? $request->sort : null,
        //         'order' => $request->order ? $request->order : null,
        //         'status' => $request->status ? $request->status : null,
        //         'search' => $request->search ? $request->search : null,
        //         'type' => $request->type ? $request->type :  null,
        //     ];

        //     $data = [];

        //     // Mengatur default urutan
        //     $order = $request->sort ? $request->sort : 'desc';

        //     // Query data berdasarkan parameter yang diberikan
        //     if ($request->has('search')) {
        //         $data = Accountnumber::where('type', 'LIKE', '%' . $request->search . '%')
        //             ->orWhere('description', 'LIKE', '%' . $request->search . '%')
        //             ->orWhere('amount', 'LIKE', '%' . $request->search . '%')
        //             ->orWhere('spent_at', 'LIKE', '%' . $request->search . '%')
        //             ->orderBy($request->order ?? 'created_at', $order)
        //             ->paginate(10);
        //     } else {
        //         $data = Accountnumber::orderBy('created_at', $order)->paginate(10);
        //     }

            return view('components.account.index');
        // } catch (Exception $err) {
        //     return dd($err);
        // }
    }

    public function createAccount()
    {
        return view('components.account.create-account');
    }

    public function storeAccount(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'account_no' => 'required',
            'type' => 'required',
            'bank_name' => 'required',
            'amount' => 'required|numeric',
            'description' => 'required',
        ]);

        // Konversi format tanggal menggunakan Carbon
        // $spent_at = Carbon::createFromFormat('d/m/Y', $request->spent_at)->format('Y-m-d');

        // Simpan data pengeluaran ke dalam database
        Accountnumber::create([
            'name' => $request->name,
            'account_no' => $request->account_no,
            'type' => $request->type,
            'bank_name' => $request->bank_name,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        // Redirect ke halaman indeks pengeluaran dengan pesan sukses
        return redirect()->route('account.index')->with('success', 'Account created successfully!');
    }

    // milik transfer transaction
    public function createTransactionTransfer()
    {
        $accountNumbers = AccountNumber::all(); // Ambil semua data dari tabel accountnumbers

        return view('components.cash&bank.create-transaction-transfer', [
            'accountNumbers' => $accountNumbers,
        ]);
    }

    public function storeTransactionTransfer(Request $request)
    {
        $request->validate([
            'transfer' => 'required',
            'deposit' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date_format:d/m/Y',
            'description' => 'required',
            'accountnumbers_id' => 'required', 

        ]);

        $date = Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');
            
        
        // Dapatkan id akun dari input form
        $account_id = $request->account_id;

        Transaction_transfer::create([
            'transfer' => $request->transfer,
            'deposit' => $request->deposit,
            'amount' => $request->amount,
            'date' => $date,
            'description' => $request->description,
            'accountnumbers_id' => $account_id,
        ]);

        return redirect()->route('cash.index')->with('success', 'Transaction Transfer Created Successfully!');
    }

    public function createTransactionSend()
    {
        $accountNumbers = AccountNumber::all(); // Ambil semua data dari tabel accountnumbers
        return view('components.cash&bank.create-transaction-send', [
            'accountNumbers' => $accountNumbers,
        ]);
    }

    public function createTransactionReceive()
    {
        $accountNumbers = AccountNumber::all(); // Ambil semua data dari tabel accountnumbers
        return view('components.cash&bank.create-transaction-receive', [
            'accountNumbers' => $accountNumbers,
        ]);
    }

    // public function indexBank()
    // {
    //     session()->flash('page', (object)[
    //         'page' => 'Transaction',
    //         'child' => 'database Bank',
    //     ]);

    //     return view('components.cash&bank.index');
    // }


    public function indexJournal(Request $request)
    {
        session()->flash('page', (object)[
            'page' => 'Transaction',
            'child' => 'database Journal',
        ]);

        // try {
        //     $form = (object) [
        //         'sort' => $request->sort ? $request->sort : null,
        //         'order' => $request->order ? $request->order : null,
        //         'status' => $request->status ? $request->status : null,
        //         'search' => $request->search ? $request->search : null,
        //         'type' => $request->type ? $request->type :  null,
        //     ];

        //     $data = [];

        //     // Mengatur default urutan
        //     $order = $request->sort ? $request->sort : 'desc';

        //     // Query data berdasarkan parameter yang diberikan
        //     if ($request->has('search')) {
        //         $data = Cash::where('type', 'LIKE', '%' . $request->search . '%')
        //             ->orWhere('description', 'LIKE', '%' . $request->search . '%')
        //             ->orWhere('amount_spent', 'LIKE', '%' . $request->search . '%')
        //             ->orWhere('spent_at', 'LIKE', '%' . $request->search . '%')
        //             ->orderBy($request->order ?? 'created_at', $order)
        //             ->paginate(10);
        //     } else {
        //         $data = Cash::orderBy('created_at', $order)->paginate(10);
        //     }

            return view('components.journal.index');
        // } catch (Exception $err) {
        //     return dd($err);
        // }
    }
}
