<?

namespace App\Traits\Helpers;

use App\Models\{User};
use Illuminate\Support\Facades\{Hash};

trait Passwordable
{
  public function getRulesMessagesPassword($currentPassword = false, $newPassword = false)
  {
    $array = [
      "rules" => [
        "current_password" => ["required", "min:6"],
        "new_password" => ["required", "min:6"],
      ],
      "messages" => [
        "current_password.required" => "Password saat ini tidak boleh kosong.",
        "current_password.min" => "Password saat ini tidak boleh kurang dari :min karakter.",
        "new_password.required" => "Password baru tidak boleh kosong.",
        "new_password.min" => "Password baru tidak boleh kurang dari :min karakter."
      ],
    ];

    if ($currentPassword)
      unset($array["rules"]["new_password"], $array["messages"]["new_password.required"], $array["messages"]["new_password.min"]);
    if ($newPassword)
      unset($array["rules"]["current_password"], $array["messages"]["current_password.required"], $array["messages"]["current_password.min"]);

    return $array;
  }

  public function validateChangePassword(User $user, $currentPassword, $newPassword)
  {
    $this->checkCurrentPassword($user, $currentPassword);
    $this->checkSamePassword($currentPassword, $newPassword);
  }

  public function checkCurrentPassword(User $user, string $currentPassword)
  {
    if (!Hash::check($currentPassword, $user->password))
      throw new \Exception("Password saat ini salah. Silakan coba lagi.");
  }

  public function checkSamePassword(string $currentPassword, string $newPassword)
  {
    if ($currentPassword === $newPassword)
      throw new \Exception("Password baru tidak boleh sama dengan password lama.");
  }

  public function alterYourPassword(User $user, $credentials, string $url, $message = "Password kamu berhasil diganti!")
  {
    $fields["password"] = Hash::make($credentials["new_password"]);
    $user->update($fields);
    return redirect($url)->withSuccess($message);
  }
}
