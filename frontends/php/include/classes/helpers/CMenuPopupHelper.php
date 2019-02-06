<?php
/*
** Zabbix
** Copyright (C) 2001-2019 Zabbix SIA
**
** This program is free software; you can redistribute it and/or modify
** it under the terms of the GNU General Public License as published by
** the Free Software Foundation; either version 2 of the License, or
** (at your option) any later version.
**
** This program is distributed in the hope that it will be useful,
** but WITHOUT ANY WARRANTY; without even the implied warranty of
** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
** GNU General Public License for more details.
**
** You should have received a copy of the GNU General Public License
** along with this program; if not, write to the Free Software
** Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
**/


class CMenuPopupHelper {

	/**
	 * Prepare data for dashboard popup menu.
	 *
	 * @param string $dashboardid
	 */
	public static function getAjaxDashboard($dashboardid) {
		return [
			'ajax' => true,
			'type' => 'dashboard',
			'data' => [
				'dashboardid' => $dashboardid
			]
		];
	}

	/**
	 * Prepare data for item history menu popup.
	 *
	 * @param string $itemid
	 *
	 * @return array
	 */
	public static function getAjaxHistory($itemid) {
		return [
			'ajax' => true,
			'type' => 'history',
			'data' => [
				'itemid' => $itemid
			]
		];
	}

	/**
	 * Prepare data for Ajax host menu popup.
	 *
	 * @param string $hostid
	 * @param bool   $has_goto     Show "Go to" block in popup.
	 *
	 * @return array
	 */
	public static function getAjaxHost($hostid, $has_goto = true) {
		$data = [
			'ajax' => true,
			'type' => 'host',
			'data' => [
				'hostid' => $hostid
			]
		];

		if ($has_goto === false) {
			$data['data']['has_goto'] = $has_goto ? '1' : '0';
		}

		return $data;
	}

	/**
	 * Prepare data for Ajax map element menu popup.
	 *
	 * @param string $sysmapid
	 * @param string $selementid
	 * @param int    $severity_min
	 * @param string $hostid
	 *
	 * @return array
	 */
	public static function getAjaxMapElement($sysmapid, $selementid, $severity_min, $hostid) {
		$data = [
			'ajax' => true,
			'type' => 'map_element',
			'data' => [
				'sysmapid' => $sysmapid,
				'selementid' => $selementid
			]
		];

		if ($severity_min != TRIGGER_SEVERITY_NOT_CLASSIFIED) {
			$data['data']['severity_min'] = $severity_min;
		}
		if ($hostid != 0) {
			$data['data']['hostid'] = $hostid;
		}

		return $data;
	}

	/**
	 * Prepare data for refresh time menu popup.
	 *
	 * @param string $widgetName		widget name
	 * @param string $currentRate		current rate value
	 * @param bool   $multiplier		multiplier or time mode
	 * @param array  $params			url parameters (optional)
	 *
	 * @return array
	 */
	public static function getRefresh($widgetName, $currentRate, $multiplier = false, array $params = []) {
		return [
			'type' => 'refresh',
			'widgetName' => $widgetName,
			'currentRate' => $currentRate,
			'multiplier' => $multiplier,
			'params' => $params
		];
	}

	/**
	 * Prepare data for Ajax trigger menu popup.
	 *
	 * @param string $triggerid
	 * @param array  $acknowledge             Acknowledge link parameters (optional).
	 * @param string $acknowledge['eventid']
	 * @param string $acknowledge['backurl']
	 * @param bool   $show_description
	 *
	 * @return array
	 */
	public static function getAjaxTrigger($triggerid, array $acknowledge = [], $show_description = true) {
		$data = [
			'ajax' => true,
			'type' => 'trigger',
			'data' => [
				'triggerid' => $triggerid
			]
		];

		if ($acknowledge) {
			$data['data']['acknowledge'] = $acknowledge;
		}

		if ($show_description === false) {
			$data['data']['show_description'] = $show_description ? '1' : '0';
		}

		return $data;
	}

	/**
	 * Prepare data for trigger macro menu popup.
	 *
	 * @return array
	 */
	public static function getAjaxTriggerMacro() {
		return [
			'ajax' => true,
			'type' => 'trigger_macro'
		];
	}

	/**
	 * Prepare data for item popup menu.
	 *
	 * @param string $itemid
	 *
	 * @return array
	 */
	public static function getAjaxItem($itemid) {
		return [
			'ajax' => true,
			'type' => 'item',
			'data' => [
				'itemid' => $itemid
			]
		];
	}

	/**
	 * Prepare data for item prototype popup menu.
	 *
	 * @param string $itemid
	 */
	public static function getAjaxItemPrototype($itemid) {
		return [
			'ajax' => true,
			'type' => 'item_prototype',
			'data' => [
				'itemid' => $itemid
			]
		];
	}
}
