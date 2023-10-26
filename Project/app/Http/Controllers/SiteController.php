<?php

namespace App\Http\Controllers;

use App\Models\Conflict;
use App\Models\Suicide;
use App\Models\Coping;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\BeanstalkdJob;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\UndefinedLivewireMethodSolutionProvider;

class SiteController extends Controller
{
    public $groups =
    ['им-11', 'им-12', 'м-11', 'м-12', 'фм-11', 'фм-12', 'ф-11', 'ф-12', 'иш-11', 'иш-12', 'рлн-11', 'рлн-12'];
    function tests()
    {
        return view('tests')->with(['count' => 3]);
    }


    function registration($do)
    {
        $text = '';
        $do_rus = '';
        if ($do == 'suicide') {
            $text = 'Если человек с множественным расстройством личности угрожает самоубийством, можно ли расценивать эту ситуацию как захват заложников?';
            $author = 'Джордж Карлин';
            $do_rus = 'Суицид';
        } elseif ($do == 'conflict') {
            $text = 'Сотрудничество — это лишь форма тихого конфликта.';
            $author = 'Учиха Мадара';
            $do_rus = 'Конфликтность';
        } elseif ($do == 'coping') {
            $text = 'Чем больше у меня проблем, тем лучше мои песни.';
            $author = 'Фредди Меркьюри';
            $do_rus = 'Копинг';
        } else {
            return redirect()->back();
        }
        // $do - переменная для ссылки формы registration.blade
        // $do_rus - контент для надписи
        // $text - описание теста
        return view("registration")->with(['title' => 'Регистрация', 'do' => $do, 'do_rus' => $do_rus, 'text' => $text, 'author' => $author]);
    }

    function suicide(Request $req)
    {
        $user_data = $req->all();
        $validated = $req->validate($this->validated());
        if ($this->check_group($validated)) {
            return back()->withError('Такой группы не существует')->withInput();
        }
        $check = $this->check_suicide_data($user_data);

        if ($check) {
            session(['user' => $user_data]);
            // Получение данных об ученике после регистрации 

            $json = DB::table('suicide')->orderBy('id')->get();
            $result = [[]];
            $index = 0;
            foreach ($json as $item) {
                $index++;
                array_push($result[count($result) - 1], $item);

                if ($index % count($json) == 0) {
                    array_push($result, []);
                }
                // Измени цифру после % - чтоб увеличить количество в массиве
            };
            // Количество страниц для пролистывания
            if ($result[1] == null) {
                $pages = 1;
            } else {
                $pages = count($result);
            }
            return view('tests.suicide')->with(['title' => 'Риск суицида', "json" => $result, 'text_title' => '«Суицидльные риски»', "pages" => $pages]);
        } else {
            return redirect()->back()->withError('Данный человек уже существует')->withInput();
        }
    }

    function conflict(Request $req)
    {
        $user_data = $req->all();
        // Проверяем, есть ли пользователь
        $check = $this->check_conflict_data($user_data);
        if ($check) {
            session(['user' => $user_data]);

            $validated = $req->validate($this->validated());
            if ($this->check_group($validated)) {
                return back()->withError('Такой группы не существует');
            }
            $json = DB::table('conflict')->orderBy('id')->get();
            $result = [[]];
            $index = 0;
            foreach ($json as $question) {
                $index++;
                array_push($result[count($result) - 1], $question);

                if ($index % count($json) == 0) {
                    array_push($result, []);
                }
            }
            if ($result[1] == null) {
                $pages = 1;
            } else {
                $pages = count($result);
            }
            return view('tests.conflict')->with(['title' => 'Уровень конфликтности', "json" => $result, 'text_title' => '«Уровень конфликтности личности»', 'pages' => $pages]);
        } else {
            return redirect()->back()->withError('Данный человек уже существует')->withInput();
        }
    }

    function coping(Request $req)
    {
        $user_data = $req->all();
        // Проверяем, есть ли пользователь
        $check = $this->check_coping_data($user_data);
        // Валидация значения

        $validated = $req->validate($this->validated());
        if ($this->check_group($validated)) {
            return back()->withError('Такой группы не существует');
        }
        if ($check) {
            session(['user' => $user_data]);

            $json = DB::table('coping')->orderBy('id')->get();
            $result = [[]];
            $index = 0;
            foreach ($json as $question) {
                $index++;
                array_push($result[count($result) - 1], $question);

                if ($index % count($json) == 0) {
                    array_push($result, []);
                }
            }
            if ($result[1] == null) {
                $pages = 1;
            } else {
                $pages = count($result);
            }

            return view('tests.coping')->with(['title' => 'Уровень копинг-стратегии', "json" => $result, 'text_title' => '«Индикатор копинг-стратегий»', 'pages' => $pages]);
        } else {
            return redirect()->back()->withError('Данный человек уже существует')->withInput();
        }
    }

    // Внесение данных в БД, а также отправка на страницу результатов
    function send_suicide(Request $req)
    {
        if ($req->session()->exists('user')) {
            $user_data = session('user');
        } else {
            return redirect(route('test.registration', ['do' => 'suicide']));
        }

        // $test_table = [
        //     ['max' => 6.4, 'index' => 3.2, 'numbers' => [1, 2]], 
        //     ['max' => 6.6, 'index' => 3.3, 'numbers' => [2, 3]],
        //     ['max' => 6, 'index' => 2, 'numbers' => [1, 3, 4]],
        // ];
        // Тестовая таблица с 3 элементами
        $validated = $req->validate($this->valid('suicide', 29));
        if ($validated) {
            $check_table = [
                ['index' => 1.2, 'numbers' => [12, 14, 20, 22, 27]],
                ['index' => 1.1, 'numbers' => [1, 10, 20, 23, 28, 29]],
                ['index' => 1.2, 'numbers' => [1, 12, 14, 22, 27]],
                ['index' => 1.5, 'numbers' => [2, 3, 6, 7, 17]],
                ['index' => 1, 'numbers' => [5, 11, 13, 15, 17, 22, 25]],
                // Спросить про соц. пессимизм
                ['index' => 2.3, 'numbers' => [8, 9, 18]],
                ['index' => 3.2, 'numbers' => [4, 16]],
                ['index' => 1.1, 'numbers' => [2, 3, 12, 24, 26, 27]],
                ['index' => 3.2, 'numbers' => [19, 21]]
            ];
            $result_table = [
                [
                    'title' => 'Демонстративность',
                    'max' => 6.0,
                    'index' => 0.0,
                    'description' => ' Желание привлечь внимание окружающих к своим несчастьям, добиться сочувствия и понимания. Оцениваемое из внешней позиции порой как "шантаж", "истероидное выпячивание трудностей", демонстративное суицидальное поведение переживается изнутри как "крик о помощи". Наиболее суицидоопасно сочетание с эмоциональной регидностью, когда "диалог с миром" может зайти слишком далеко.'
                ],
                [
                    'title' => 'Аффективность',
                    'max' => 6.6,
                    'index' => 0.0,
                    'description' => 'Доминирование эмоций над интеллектуальным контролем в оценке ситуации. Готовность реагировать на психотравмирующую ситуацию непосредственно эмоционально. В крайнем варианте - аффективная блокада интеллекта.'
                ],
                [
                    'title' => 'Уникальность',
                    'max' => 6.0,
                    'index' => 0.0,
                    'description' => 'Восприятие себя, ситуации, и, возможно, собственной жизни в целом как явления исключительного, не похожего на другие, и, следовательно, подразумевающего исключительные варианты выхода, в частности, суицид. Тесно связана с феноменом "непроницаемости" для опыта, т.е. с недостаточным умением использовать свой и чужой жизненный опыт.'
                ],
                [
                    'title' => 'Несостоятельность',
                    'max' => 7.5,
                    'index' => 0.0,
                    'description' => 'Отрицательная концепция собственной личности. Представление о своей несостоятельности, некомпетентности, ненужности, "выключенности" из мира. Данная субшкала может быть связана с представлениями о физической, интеллектуальной, моральной и прочей несостоятельностью. Несостоятельность выражает интрапунитивный радикал. Формула внешнего монолога - "Я плох".'
                ],
                [
                    'title' => 'Социальный пессимизм',
                    'max' => 7.0,
                    'index' => 0.0,
                    'description' => 'Отрицательная концепция окружающего мира. Восприятие мира как враждебного, не соответствующего представлениям о нормальных или удовлетворительных для человека отношениях с окружающими. Социальный пессимизм тесно связан с экстрапунитивным стилем каузальной атрибуции. В отсутствие Я наблюдается экстрапунитивность по формуле внутреннего монолога "Вы все недостойны меня".'
                ],
                [
                    'title' => 'Слом культурных барьеров',
                    'max' => 6.9,
                    'index' => 0.0,
                    'description' => 'Культ самоубийства. Поиск культурных ценностей и нормативов, оправдывающих суицидальное поведение или даже делающих его в какой-то мере привлекательным. Заимствование суицидальных моделей поведения из литературы и кино. В крайнем варианте - инверсия ценности смерти и жизни. В отсутствие выраженных пиков по другим шкалам это может говорить только об "экзистенции смерти". Одна из возможных внутренних причин культа смерти - доведенная до патологического максимализма смысловая установка на самодеятельность: "Вершитель собственной судьбы сам определяет конец своего существования".
                    '
                ],
                [
                    'title' => 'Максимализм',
                    'max' => 6.4,
                    'index' => 0.0,
                    'description' => 'Инфантильный максимализм ценностных установок. Распространение на все сферы жизни содержания локального конфликта в какой-то одной жизненной сфере. Невозможность компенсации. Аффективная фиксация на неудачах.'
                ],
                [
                    'title' => 'Временная перспектива',
                    'max' => 6.6,
                    'index' => 0.0,
                    'description' => 'Невозможность конструктивного планирования будущего. Это может быть следствием сильной погруженности в настоящую ситуацию, трансформацией чувства неразрешимости текущей проблемы в глобальный страх неудач и поражений в будущем.'
                ],
                [
                    'title' => 'Антисуицидальный фактор',
                    'max' => 6.4,
                    'index' => 0.0,
                    'description' => 'Даже при высокой выраженности всех остальных факторов есть фактор, который снимает глобальный суицидальный риск. Это глубокое понимание чувства ответственности за близких, чувство долга. Это представление о греховности самоубийства, антиэстетичности его, боязнь боли и физических страданий. В определенном смысле это показатель наличного уровня предпосылок для психокоррекционной работы. Высокий показатель – не склонен человек. Низкий показатель – склонен человек.'
                ]
            ];

            $result = $req->all();
            for ($i = 1; $i <= count($result); $i++) { #ФИЧА Перебираем значения от 1 до 29
                for ($j = 0; $j < count($check_table); $j++) { // Перебираем массив со значениями
                    if (in_array($i, $check_table[$j]['numbers']) && $result['suicide' . $i]) { // Проверяем наличие числа от 1 до 29 в массивах
                        $result_table[$j]['index'] += $check_table[$j]['index'];
                    };
                }
            }
            uasort($result_table, function ($a, $b) {
                return $a['index'] < $b['index'];
            });

            $arr = [
                'group' => $user_data['group'],
                'name' => $user_data['name'],
                'lastname' => $user_data['lastname'],
                'results' => json_encode($result_table)
            ];

            $db = Suicide::where([
                ['name', '=', $user_data['name']],
                ['lastname', '=', $user_data['lastname']],
                ['group',  '=', $user_data['group']]
            ])->first();
            if ($db == null) {
                $db = Suicide::query()->create($arr);
            }
            return view('results')->with(['results' => $result_table, 'title' => "Результаты"]);
        }
    }

    function send_conflict(Request $req)
    {
        if ($req->session()->exists('user')) {
            $user_data = session('user');
        } else {
            return redirect(route('test.registration', ['do' => 'conflict']));
        }

        $validated = $req->validate($this->valid('conflict', 14));
        if ($validated) {
            $res = [
                'title' => 'Конфликтность',
                'max' => 42,
                'index' => 0,
                'description' => 'Свойство личности, которое отражает частоту ее вступления в межличностные конфликты. Высокий уровень конфликтности часто приводит к разногласиям и дракам, и чем выше этот уровень - тем чаще человек будет испытывать это на себе. ',
                'result' => ''
            ];
            // Пока что не знаю как выводить, но пусть будет так 
            $request = $req->all();
            foreach ($request as $result) {
                $res['index'] += $result;
            }

            $num = $res['index'];
            if ($num < 23) {
                $res['result'] = 'Ниже среднего';
            } elseif ($num > 23 && $num < 32) {
                $res['result'] = 'Средний';
            } else {
                $res['result'] = 'Выше среднего';
            }

            $arr = [
                'group' => $user_data['group'],
                'name' => $user_data['name'],
                'lastname' => $user_data['lastname'],
                'results' => json_encode(["index" => $res['index'], "result" => $res['result']])
            ];

            $db = Conflict::where([
                ['name', '=', $user_data['name']],
                ['lastname', '=', $user_data['lastname']],
                ['group',  '=', $user_data['group']]
            ])->first();
            if ($db == null) {
                $db = Conflict::query()->create($arr);
            }
            return view('results')->with(["results" => $res, 'title' => 'Результаты']);
        }
    }

    function send_coping(Request $req)
    {
        if ($req->session()->exists('user')) {
            $user_data = session('user');
        } else {
            return redirect(route('test.registration', ['do' => 'coping']));
        }

        $validated = $req->validate($this->valid('coping', 33));
        if ($validated) {
            $check_table = [
                [2, 3, 8, 9, 11, 15, 16, 17, 20, 29, 33],
                [1, 5, 7, 12, 14, 19, 23, 24, 25, 31, 32],
                [4, 6, 10, 13, 18, 21, 22, 26, 27, 28, 30]
            ];
            $result_table = [
                [
                    'title' => 'Стратегия разрешения проблем',
                    'index' => 0,
                    'max' => 33,
                    'description' => 'Это активная поведенческая стратегия, при которой человек старается использовать все имеющиеся у него личностные ресурсы для поиска возможных способов эффективного разрешения проблемы.
                '
                ],
                [
                    'title' => 'Страгетегия поиска социальной поддержки',
                    'index' => 0,
                    'max' => 33,
                    'description' => 'Это активная поведенческая стратегия, при которой человек для эффективного разрешения проблемы обращается за помощью и поддержкой к окружающей его среде: семье, друзьям, значимым другим.
                '
                ],
                [
                    'title' => 'Стратегия избегания проблем',
                    'index' => 0,
                    'max' => 33,
                    'description' => 'Это поведенческая стратегия, при которой человек старается избежать контакта с окружающей его действительностью, уйти от решения проблем.'
                ]
            ];

            $result = $req->all();
            for ($i = 1; $i <= count($result); $i++) {
                for ($j = 0; $j < count($check_table); $j++) {
                    if (in_array($i, $check_table[$j]) && $result['coping' . $i]) {
                        $result_table[$j]['index'] += $result['coping' . $i];
                    }
                }
            }

            $arr = [
                'group' => $user_data['group'],
                'name' => $user_data['name'],
                'lastname' => $user_data['lastname'],
                'results' => json_encode($result_table)
            ];

            $db = Coping::where([
                ['name', '=', $user_data['name']],
                ['lastname', '=', $user_data['lastname']],
                ['group',  '=', $user_data['group']]
            ])->first();
            if ($db == null) {
                $db = Coping::query()->create($arr);
            }
            return view('results')->with(["results" => $result_table, 'title' => 'Результаты']);
        }
    }


    // Проверка, имеется ли уже такой пользователь
    function check_suicide_data($user_data)
    {
        $db = Suicide::where([
            ['name', '=', $user_data['name']],
            ['lastname', '=', $user_data['lastname']],
            ['group',  '=', $user_data['group']]
        ])->first();
        if ($db == null) {
            return true;
        } else {
            return false;
        }
    }
    function check_conflict_data($user_data)
    {
        $db = Conflict::where([
            ['name', '=', $user_data['name']],
            ['lastname', '=', $user_data['lastname']],
            ['group',  '=', $user_data['group']]
        ])->first();
        if ($db == null) {
            return true;
        } else {
            return false;
        }
    }
    function check_coping_data($user_data)
    {
        $db = Coping::where([
            ['name', '=', $user_data['name']],
            ['lastname', '=', $user_data['lastname']],
            ['group',  '=', $user_data['group']]
        ])->first();
        if ($db == null) {
            return true;
        } else {
            return false;
        }
    }

    // Вводишь name input`a, и количество строк
    function valid($name, $max)
    {

        $arr = [];
        for ($i = 1; $i <= $max; $i++) {
            $arr[$name . '' . $i] = 'required';
        }
        return $arr;
    }

    function validated()
    {
        return ['name' => ['filled', 'string', 'min:2', 'alpha'], 'lastname' => ['filled', 'string', 'min:2', 'alpha'], 'group' => ['filled']];
    }
    function check_group($validated)
    {
        if (!in_array(mb_strtolower($validated['group']), $this->groups)) {
            return true;
        }
    }

    function results()
    {
        return view('adminCheck')->with(['title' => 'Просмотр результатов']);
    }

    function results_get(Request $req)
    {
        $result = $req->all();
        $do = $result['do'];
        $tables = ['suicides', 'conflicts', 'copings'];
        $test_name = isset($result['test']) ? $result['test'] : null;
        $group = isset($result['group']) ? $result['group'] : null;
        $name = isset($result['name']) ? $result['name'] : null;
        $lastname = isset($result['lastname']) ? $result['lastname'] : null;
        // dd($group);

        switch($do){
            case 'name':
                $result_table = [];
                // Таблица с результатми
                foreach ($tables as $item) {
                    $result_table = array_merge($result_table, $this->result_help($item, ['name', '=', $name], ['lastname', '=', $lastname]));
                    // Обьединение таблицы результатов с полученными данными
                }

                return $result_table != null  
                ? view('adminCheck', (['result' => $result_table, 'title' => 'Good'])) 
                : redirect()->back()->withInput()->withError('Такого человек не найден');
                break;

            case 'all':
                $result_table = [];
                // Таблица с результатми
                foreach ($tables as $item) {
                    $result_table = array_merge($result_table, $this->result_help($item));
                    // Обьединение таблицы результатов с полученными данными
                }
                // dd($result_table);

                return $result_table != null  
                ? view('adminCheck', (['result' => $result_table, 'title' => 'Good'])) 
                : redirect()->back()->withInput()->withError('Никто ещё не проходил тест');
                break;
            case 'group':
                $result_table = [];
                // Таблица с результатми
                foreach ($tables as $item) {
                    $result_table = array_merge($result_table, $this->result_help($item, ['group', '=', $group]));
                    // Обьединение таблицы результатов с полученными данными
                }
                // dd($result_table);

                return $result_table != null  
                ? view('adminCheck', (['result' => $result_table, 'title' => 'Good'])) 
                : redirect()->back()->withInput()->withError('Группа не найдена');
                break;
        }
    }

    function result_help($table, ...$query)
    {
        $result_table = [];
        $db = DB::table($table)->where([[$query]])->get()->sortBy('id');
        // dd($db);
        foreach ($db as $item) {
            // dd($item);
            $table = ['name' => '', 'lastname' => '', 'group' => '', 'results' => ''];
            $table['name'] = $item->name;
            $table['lastname'] = $item->lastname;
            $table['group'] = $item->group;
            $table['results'] = json_decode($item->results);
            array_push($result_table, $table);
        }
        // dd($result_table);
        return $result_table;
    }
}
// #ЧЗХ Добавить возможность удаления записей