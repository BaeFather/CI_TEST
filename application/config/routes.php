<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| 이 파일을 사용하면 URI 요청을 특정 컨트롤러 기능에 다시 매핑할 수 있습니다.
|
| 일반적으로 URL 문자열 간에는 일대일 관계가 있습니다.
| 및 해당 컨트롤러 클래스/메서드. 세그먼트는
| URL은 일반적으로 다음 패턴을 따릅니다.
|
| example.com/class/method/id/
|
| 그러나 어떤 경우에는 이 관계를 다시 매핑해야 할 수도 있습니다.
| 다른 클래스/함수가 호출되는 것과는 다릅니다.
| URL에 해당합니다.
|
| 자세한 내용은 사용자 가이드를 참조하세요.
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| 세 가지 예약된 경로가 있습니다.
|
|	$route['default_controller'] = 'welcome';
|
| 이 경로는 다음과 같은 경우 어떤 컨트롤러 클래스를 로드해야 하는지 나타냅니다.
| URI에 데이터가 없습니다. 위의 예에서 "welcome" 클래스는
| 로드됩니다.
|
|	$route['404_override'] = 'errors/page_missing';
|
| 이 경로는 라우터에 어떤 컨트롤러/방법을 사용할지 알려줍니다.
| URL에 제공된 경로는 유효한 경로와 일치할 수 없습니다.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| 이는 정확한 경로는 아니지만 자동으로 경로를 지정할 수 있습니다.
| 대시가 포함된 컨트롤러 및 메서드 이름입니다. '-'는 유효하지 않습니다
| 클래스 또는 메소드 이름 문자이므로 번역이 필요합니다.
| 이 옵션을 TRUE로 설정하면
| 컨트롤러 및 메서드 URI 세그먼트.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['board/(:num)'] = "board/index";
$route['board/create'] = "board/create";
$route['board/store']['post'] = "board/store";
$route['board/show/(:num)'] = "board/show/$1";
$route['board/edit/(:num)'] = "board/edit/$1";
$route['board/update/(:num)']['put'] = "board/update/$1";
$route['board/delete/(:num)']['delete'] = "board/delete/$1";
$route['board/drop/(:num)']['drop'] = "board/drop/$1";
