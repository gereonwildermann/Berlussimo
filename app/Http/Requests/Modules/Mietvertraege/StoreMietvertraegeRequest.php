<?php

namespace App\Http\Requests\Modules\Mietvertraege;


use App\Http\Requests\Legacy\MietvertraegeRequest;
use DB;
use Validator;

class StoreMietvertraegeRequest extends MietvertraegeRequest
{
    public function rules()
    {
        $move_in_date_rule = 'required|date';
        $v = Validator::make($this->all(), ['unit' => 'required|integer']);
        if ($v->valid()) {
            $units = DB::select(
                                "SELECT EINHEIT.EINHEIT_ID,
                                    IF(MIN(MIETVERTRAG_BIS) = '0000-00-00', MIN(MIETVERTRAG_BIS), MAX(MIETVERTRAG_BIS)) AS MIETVERTRAG_BIS
                                FROM MIETVERTRAG
                                    RIGHT JOIN EINHEIT ON (EINHEIT.EINHEIT_ID = MIETVERTRAG.EINHEIT_ID AND MIETVERTRAG_AKTUELL = '1')
                                    LEFT JOIN DETAIL ON (EINHEIT.EINHEIT_ID = DETAIL.DETAIL_ZUORDNUNG_ID AND DETAIL_ZUORDNUNG_TABELLE = 'Einheit' AND DETAIL_NAME = 'Fertigstellung in Prozent' AND DETAIL_AKTUELL = '1')
                                WHERE EINHEIT_AKTUELL = '1'
					AND (DETAIL_INHALT > 99 OR DETAIL_INHALT IS NULL)
                                    AND EINHEIT.EINHEIT_ID = ?
                                GROUP BY EINHEIT.EINHEIT_ID
                                HAVING (MIETVERTRAG_BIS != '0000-00-00' OR MIETVERTRAG_BIS IS NULL)",
                [$this->get('unit')]
            );
            if (!empty($units)) {
                                $unit = (array) $units[0];
                                if (!empty($unit['MIETVERTRAG_BIS'])) {
                                        $move_in_date_rule .= '|after:' . $unit['MIETVERTRAG_BIS'];
                                }
            }
        }

        return [
            'tenants' => 'required|array',
            'unit' => 'required|integer',
            'move-in-date' => $move_in_date_rule,
            'move-out-date' => 'date|after:move-in-date|nullable',
            'rent' => 'required|numeric|min:0',
            'deposit' => 'numeric|min:0',
            'bk-advance' => 'numeric|min:0',
            'hk-advance' => 'numeric|min:0'
        ];
    }

}