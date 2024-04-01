<?php

namespace App\Exports\Users;

use App\Models\User;
use Maatwebsite\Excel\Concerns\{
  Exportable,
  WithProperties,
  WithTitle,
  FromCollection,
  WithHeadings,
  WithMapping,
  WithCustomValueBinder,
  WithStyles,
};
use PhpOffice\PhpSpreadsheet\Cell\{
  DefaultValueBinder,
  Cell,
  DataType,
};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport extends DefaultValueBinder
implements WithProperties, FromCollection, WithTitle, WithHeadings, WithMapping, WithCustomValueBinder, WithStyles
{
  // ---------------------------------
  // TRAITS
  use Exportable;


  // ---------------------------------
  // PROPERTIES


  // ---------------------------------
  // CORES
  public function properties(): array
  {
    return [
      'title'          => 'All of Users Export',
      'description'    => "Total of users who have registered on the " . config('app.name'),
      'subject'        => 'Users',
      'keywords'       => 'Users,export,spreadsheet',
      'category'       => 'Users',
    ];
  }

  public function collection()
  {
    return User::with([
      "golonganPangkat",
      "eselon",
      "jabatan",
      "lokasiKerja",
      "unitKerja",
      "agama",
    ])
      ->latest()
      ->get();
  }


  // ---------------------------------
  // UTILITIES
  public function title(): string
  {
    return "All of Users";
  }
  public function headings(): array
  {
    return [
      'NIP',
      'Nama lengkap',
      'Tempat lahir',
      'Alamat',
      'Tanggal lahir',
      'Gender',
      'Telepon',
      'Email',
      'NPWP',
      'Golongan pangkat',
      'Eselon',
      'Jabatan',
      'Lokasi kerja',
      'Unit kerja',
      'Agama',
      'Role',
      'Foto profil',
      'Dibuat pada',
    ];
  }
  public function map($user): array
  {
    return [
      $user->nip,
      $user->nama_lengkap,
      $user->tempat_lahir,
      $user->alamat,
      $user->tanggal_lahir->format("Y-m-d"),
      $user->gender,
      $user->telepon,
      $user->email,
      $user->npwp ?? "-",
      $user->golonganPangkat->kode_golongan . "/" . $user->golonganPangkat->kode_ruang . " - " . $user->golonganPangkat->nama_golongan,
      $user->eselon->kode_eselon . "." . $user->eselon->nama_eselon,
      $user->jabatan->nama_jabatan,
      $user->lokasiKerja->nama_lokasi_kerja . "(" . $user->lokasiKerja->nama_alias . ")",
      $user->unitKerja->nama_unit_kerja,
      $user->agama->nama_agama,
      $user->role,
      $user->foto_profil ? "Y" : "N",
      $user->created_at->format('j F Y, \a\t H.i'),
    ];
  }
  public function bindValue(Cell $cell, $value)
  {
    // Convert numeric into text
    if (is_numeric($value)) {
      $cell->setValueExplicit($value, DataType::TYPE_STRING);
      return true;
    }

    // Return default behavior
    return parent::bindValue($cell, $value);
  }
  public function styles(Worksheet $sheet)
  {
    $sheet->getStyle("1")->getFont()->setBold(true);
  }
}
