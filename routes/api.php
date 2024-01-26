use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Регистрация пользователя
Route::post('/register', 'AuthController@register');

// Авторизация пользователя
Route::post('/login', 'AuthController@login');

// Маршруты для сообщений
Route::middleware('auth:api')->group(function () {
    // Создание сообщения
    Route::post('/messages', 'MessageController@create');

    // Редактирование сообщения
    Route::put('/messages/{id}', 'MessageController@update');

    // Получение сообщений видимых всем
    Route::get('/messages/public', 'MessageController@getPublicMessages');

    // Получение сообщений видимых только зарегистрированным пользователям
    Route::get('/messages/private', 'MessageController@getPrivateMessages');

    // Получение сообщений видимых конкретным пользователем
    Route::get('/messages/user/{userId}', 'MessageController@getUserMessages');

    // Удаление сообщения
    Route::delete('/messages/{id}', 'MessageController@delete');

    // Ответ на сообщение
    Route::post('/messages/{id}/reply', 'MessageController@reply');
});
