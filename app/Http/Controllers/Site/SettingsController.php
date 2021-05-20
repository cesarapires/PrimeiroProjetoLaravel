<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index(){
        $numberPlatform = DB::table('platforms')->count();
        $numberPlot = DB::table('plots')->count();
        $numberPayment = DB::table('payments')->count();

        return view('Site.Configuracao.index',[
            'numberPlatform' => $numberPlatform,
            'numberPlot'=> $numberPlot,
            'numberPayment' => $numberPayment
        ]);
    }

    public function indexPlatform(){
        $platform = DB::table('platforms')->get();
        return view('Site.Configuracao.Plataformas.index',[
            'platform' => $platform,
        ]);
    }

    public function indexPlot(){
        $plot = DB::table('plots')->get();
        return view('Site.Configuracao.Parcelas.index',[
            'plot' => $plot,
        ]);
    }

    public function indexPayment(){
        $payment = DB::table('payments')->get();
        return view('Site.Configuracao.Pagamentos.index',[
            'payment' => $payment,
        ]);
    }

    public function storePlots(Request $request){
        DB::table('plots')->insert([
            'name'=>$request->namePlot,
            'number'=>$request->numberPlot,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        
        return redirect('Configuracao/Parcelas');
    }

    public function updatePlots(Request $request){
        DB::table('plots')->
        where('plot_id','=',$request->edtidPlot)->
        update([
            'name'=>$request->edtnamePlot, 
            'updated_at' => date("Y-m-d H:i:s")  
        ]);        
        return redirect('Configuracao/Parcelas');
    }

    public function deletePlots(Request $request){
        DB::table('plots')->
        where('plot_id','=',$request->delidPlot)->
        delete();
        return redirect('Configuracao/Parcelas');
    }


    public function storePayments(Request $request){
        DB::table('payments')->insert([
            'name'=>$request->namePayment,
            'payment_rate'=>$request->ratePayment,
            'payment_fixrate'=>$request->fixratePayment,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        
        return redirect('Configuracao/Pagamento');
    }

    public function updatePayments(Request $request){
        DB::table('payments')->
        where('payment_id','=',$request->edtidPayment)->
        update([
            'name'=>$request->edtnamePayment, 
            'payment_rate'=>$request->edtratePayment,
            'payment_fixrate'=>$request->edtfixratePayment,
            'updated_at' => date("Y-m-d H:i:s")  
        ]);        
        return redirect('Configuracao/Pagamento');
    }

    public function deletePayments(Request $request){
        DB::table('payments')->
        where('payment_id','=',$request->delidPayment)->
        delete();
        return redirect('Configuracao/Pagamento');
    }


    public function storePlatforms(Request $request){
        DB::table('platforms')->insert([
            'name'=>$request->namePlatform,
            'platform_rate'=>$request->ratePlatform,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        
        return redirect('Configuracao/Plataformas');
    }

    public function updatePlatforms(Request $request){
        DB::table('platforms')->
        where('platform_id','=',$request->edtidPlatform)->
        update([
            'name'=>$request->edtnamePlatform, 
            'updated_at' => date("Y-m-d H:i:s")  
        ]);        
        return redirect('Configuracao/Plataformas');
    }

    public function deletePlatforms(Request $request){
        DB::table('platforms')->
        where('platform_id','=',$request->delidPlatform)->
        delete();
        return redirect('Configuracao/Plataformas');
    }
}
