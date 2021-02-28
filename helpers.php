<?php

/**
 * Функция для получения элемента многомерного массива
 * @param $array array - массив, котором осуществляется поиск
 * @param $key string - строка - путь до искомого значения
 * @param null $default - значение возвращаемое по умолчание, в случае неудачного поиска
 * @return mixed|null - искомое значение или значение по умолчанию
 */
function array_get(array $array, string $key, $default = null)
{
    $keys = explode('.', $key);
    foreach ($keys as $key) {
        if (array_key_exists($key, $array)) {
            $array = $array[$key];
        } else {
            return $default;
        }
    }
    return $array;
}

/**
 * Функция подключения частей сайта
 * @param string $templateName - имя шаблона, который подключается
 * @param null $data - информация для отображения в шаблоне
 */
function includeView(string $templateName, $data = null)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/view/layout/' . $templateName . '.php';
}

/**
 * Функция получения url-парамметров
 * @param string $url - адрес url
 * @param null $key - конкретный ключ параметра из url, который необходимо вернуть
 * @return mixed - парамметр с ключем $key, либо все парамметры
 */
function getUrlQuery(string $url, $key = null)
{
    parse_str(parse_url($url, PHP_URL_QUERY), $query);
    if (is_null($key)) {
        return $query;
    } elseif (isset($query[$key])) {
        return $query[$key];
    }
}

/**
 * Функция, приводящяю путь в формату типа /path
 * @param string $uri - url требующий преобразования
 * @param string $separator - разделитель, по которому необходимо делить
 * @return string - оторматированный uri
 */
function preparePathToFormat(string $uri, $separator = '/')
{
    $pathArr = str_split($uri);

    if ($pathArr[0] !== $separator) {
        array_unshift($pathArr, '/');
    }

    if ($pathArr[count($pathArr) - 1] === $separator && count($pathArr) > 1) {
        unset($pathArr[count($pathArr) - 1]);
    }

    return implode('', $pathArr);
}

/**
 * Функция извлечения данных из url
 * @param string $url - url-путь страницы
 * @param string $pattern - заданный путь в Route
 * @return array - массив парамметров для callback-функции
 */
function extractURLData(string $url, string $pattern): array
{
    $result = [];
    $patternArr = explode('/', $pattern);
    $urlArr = explode('/', $url);
    foreach ($patternArr as $key => $param) {
        if ($param === '*') {
            $result[] = $urlArr[$key];
        }
    }

    return $result;
}
