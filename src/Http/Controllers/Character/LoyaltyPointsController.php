<?php

/*
 * This file is part of SeAT
 *
 * Copyright (C) 2015 to 2022 Leon Jacobs
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace Seat\Web\Http\Controllers\Character;

use Seat\Eveapi\Models\Character\CharacterInfo;
use Seat\Web\Http\Controllers\Controller;
use Seat\Web\Http\DataTables\Character\Financial\LoyaltyPointsDataTable;
use Seat\Web\Http\DataTables\Scopes\CharacterScope;

/**
 * Class LoyaltyPointsController.
 *
 * @package Seat\Web\Http\Controllers\Character
 */
class LoyaltyPointsController extends Controller
{
    /**
     * @param  CharacterInfo  $character
     * @param  \Seat\Web\Http\DataTables\Character\Financial\LoyaltyPointsDataTable  $dataTable
     * @return mixed
     */
    public function index(CharacterInfo $character, LoyaltyPointsDataTable $dataTable)
    {
        return $dataTable
            ->addScope(new CharacterScope('character.loyalty_points', request()->input('characters')))
            ->render('web::character.loyalty-points', compact('character'));
    }
}
