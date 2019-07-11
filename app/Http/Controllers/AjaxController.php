<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
	public function getChiPhiSuaChua($id)
	{
		echo '<label>Tổng chi phí</label><input type="text" class="form-control" value="'.number_format($id).'" name="numChiPhi" placeholder="Tổng chi phí" disabled="disabled">';
	}
}
