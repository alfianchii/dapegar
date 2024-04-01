<?

namespace App\Traits;

trait Responsable
{
  public function responseJsonMessage($message, $status = 200)
  {
    return response()->json([
      "message" => $message,
    ], $status);
  }
}
