<?php

namespace App\Http\Controllers;

//MODELS
//CONTROLLERS
use App\Products;
use App\Product_new_log;
//LIBRARYS
use Excel;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Input;

class UploadExcel extends Controller
{
    public $productMessage = array(); //SE CREA EL ARRAY PARA PODER ENVIAR UN CORREO CON LOS DATOS GUARDADOS EN EL LOG DE PRODUCTS
    //INDEX
    public function index()
    {
        return view('index');
    }
    //SUBIR ARCHIVO
    public function uploadFile()
    {
        try {
            Excel::load(Input::file('customer'), function ($reader) {
                $reader->each(function ($sheet) { //RECORRO EL EXCEL
                    $valor = $sheet->toArray()['secuencial']; //SECUENCIAL
                    $cantidadActualizar = $sheet->toArray()['cantidad']; //CANTIDAD
                    $this->updateOrInsertDB($valor, $cantidadActualizar, $sheet); //BUSCO SI EXISTE LA SECUENCIAL
                });
            });
            return redirect()->back()->with(['success' => 'Subido con exito a la bd', 'products' => $this->productMessage]); //OK CAMBIO LOS DATOS
        } catch (Exception $e) {
            return redirect()->back()->with(['errors' => "Favor de subir un archivo con formato xlsx,xls"]);
        }
    }
    //ACTUALIZO LOS REGISTROS
    public function updateOrInsertDB($buscar, $cantidad, $sheet)
    {
        $product = Products::where('secuencial', $buscar)->first(); //BUSCO SI EXISTE ESE PRODUCT EN LA BD
        $consultProductLog = Product_new_log::where('secuencial', $buscar)->first();
        if (empty($product)) { //PREGUNTO SI HAY DATOS
            if (empty($consultProductLog)) { //PREGUNTO SI YA EXISTE EL REGISTRO EN PRODUCT LOG
                $productLog = Product_new_log::firstOrCreate($sheet->toArray()); //SUBIDA A LA BD DEL LOG PRODUCT
                $this->arrayProductsLog($productLog);
            }
        } else {
            $idProduct = $product->id;
            DB::select("UPDATE products SET cantidad='$cantidad' WHERE id = '$idProduct'"); //SEEDER: ACTUALIZO LOS DATOS
        }
    }

    //GUARDAR EN UN ARRAY LOS PRODUCTS LOGS
    public function arrayProductsLog($productLog)
    {
        array_push($this->productMessage, $productLog);
    }

    //UPLOAD FILE SERVER
    /*public function validatorFile($request){
$validator = Validator::make($request->all(),[
'customer'=>'required|max:500000|mimes:xlsx,xls',
]);
if(!$validator->passes()) return false;
//TRUE?
$dateTime = date('Ymd_His');
$file = $request->file('customer');
$fileName = $dateTime . '-' . $file->getClientOriginalName();
$savePath = public_path('/uploads/');
$file->move($savePath,$fileName);
return true;
}*/
}
