<?php
namespace App\Http\Controllers\Api;
use App\API\ApiError;
use App\Musica;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class MusicaController extends Controller
{
	/**
	 * @var Musica
	 */
	private $musica;
	public function __construct(Musica $musica)
	{
		$this->musica = $musica;
	}
	public function index()
    {
    	sleep(2);
    	return response()->json($this->musica->paginate(10));
    }
    public function show($id)
    {
    	$musica = $this->musica->find($id);
    	if(! $musica) return response()->json(['data' => ['msg' => 'Musica não encontrada!']], 404);
    	$data = ['data' => $musica];
	    return response()->json($data);
    }
    public function store(Request $request)
    {
		try {
			$musicaData = $request->all();
			$this->musica->create($musicaData);
			$return = ['data' => ['msg' => 'Musica criada com sucesso!']];
			return response()->json($return, 201);
		} catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1010));
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de salvar', 1010));
		}
    }
	public function update(Request $request, $id)
	{
		try {
			$musicaData = $request->all();
			$musica     = $this->musica->find($id);
			$musica->update($musicaData);
			$return = ['data' => ['msg' => 'Musica atualizada com sucesso!']];
			return response()->json($return, 201);
		} catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1011));
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de atualizar', 1011));
		}
	}
	public function delete(Musica $id)
	{
		try {
			$id->delete();
			return response()->json(['data' => ['msg' => 'Musica: ' . $id->name . ' removida com sucesso!']], 200);
		}catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1012));
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de remover', 1012));
		}
	}

	public function drop()
	{
		try {
			$product = $this->musica->get();
        foreach($product as $item){
            $teste = $product->find($item['id']);
            $teste->delete();
        }
			return response()->json(['data' => ['msg' => 'Musica: ' . $id->name . ' removida com sucesso!']], 200);
		}catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1012));
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de remover', 1012));
		}
	}
}