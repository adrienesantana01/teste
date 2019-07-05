<?php
namespace App\Http\Controllers\Api;
use App\API\ApiError;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class VideoController extends Controller
{
	/**
	 * @var Anime
	 */
	private $Video;
	public function __construct(Video $video)
	{
		$this->video = $video;
	}
	public function index()
    {
    	return response()->json($this->video->paginate(10));
    }
    public function show($id)
    {
    	$video = $this->video->find($id);
    	if(! $video) return response()->json(['data' => ['msg' => 'Video não encontrado!']], 404);
    	$data = ['data' => $video];
	    return response()->json($data);
    }
    public function store(Request $request)
    {
		try {
			$videoData = $request->all();
			$this->video->create($videoData);
			$return = ['data' => ['msg' => 'Video criado com sucesso!']];
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
			$videoData = $request->all();
			$anime     = $this->video->find($id);
			$video->update($videoData);
			$return = ['data' => ['msg' => 'Video atualizado com sucesso!']];
			return response()->json($return, 201);
		} catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1011));
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de atualizar', 1011));
		}
	}
	public function delete(Video $id)
	{
		try {
			$id->delete();
			return response()->json(['data' => ['msg' => 'Video: ' . $id->name . ' removido com sucesso!']], 200);
		}catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1012));
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de remover', 1012));
		}
	}
}