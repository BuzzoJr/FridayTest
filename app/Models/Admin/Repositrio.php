<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;
use App\Http\Controllers\Traits\Admin\AdmikoAuditableTrait;
use App\Http\Controllers\Traits\Admin\AdmikoMultiTenantModeTrait;

class Repositrio extends Model
{
    use AdmikoFileUploadTrait,AdmikoAuditableTrait,AdmikoMultiTenantModeTrait;

    public $table = 'repositrio';
    
    
	static $admiko_file_info = [
		"arquivo"=>[
			"original"=>["folder"=>"upload/"]
		]
	];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"nome",
		"descrio",
		"arquivo",
		"arquivo_admiko_delete",
    ];
    public function setArquivoAttribute()
    {
        if (request()->hasFile('arquivo')) {
            $this->attributes['arquivo'] = $this->fileUpload(request()->file("arquivo"), Repositrio::$admiko_file_info["arquivo"], $this->getOriginal('arquivo'));
        }
    }
    public function setArquivoAdmikoDeleteAttribute($value)
    {
        if (!request()->hasFile('arquivo') && request()->arquivo_admiko_delete == 1) {
            $this->attributes['arquivo'] = $this->fileUpload('', Repositrio::$admiko_file_info["arquivo"], $this->getOriginal('arquivo'), $value);
        }
    }
}