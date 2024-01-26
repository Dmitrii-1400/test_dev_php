namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    // Метод для получения всех сообщений
    public function index()
    {
        $messages = Message::all();
        return response(['messages' => $messages]);
    }

    // Метод для получения конкретного сообщения по идентификатору
    public function show($id)
    {
        $message = Message::find($id);
        if (!$message) {
            return response(['message' => 'Message not found'], 404);
        }
        return response(['message' => $message]);
    }

    // Метод для обновления конкретного сообщения
    public function update(Request $request, $id)
    {
        $message = Message::find($id);
        if (!$message) {
            return response(['message' => 'Message not found'], 404);
        }

        $message->content = $request->input('content');
        $message->is_public = $request->input('is_public');
        $message->save();

        return response(['message' => $message]);
    }

    // Метод для удаления конкретного сообщения
    public function destroy($id)
    {
        $message = Message::find($id);
        if (!$message) {
            return response(['message' => 'Message not found'], 404);
        }
        
        $message->delete();

        return response(['message' => 'Message deleted']);
    }
}
