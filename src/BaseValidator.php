<?php

namespace App;

/**
 * Базовый класс валидатора
 *
 * Содержит базовые методы валидации. В наследниках можно использовать все эти методы в методе validate().
 * Надо подумать насчет реализации паттерна Цепочка ответственности или декоратора
 */
abstract class BaseValidator implements ValidationInterface
{
    /**
     * Возвращает true если переданы пустые данные
     *
     * @param $data
     * @return bool
     */
    protected function isEmpty($data): bool
    {
        return empty($data);
    }

    /**
     * Проверяет корректность email
     *
     * @param string $email - электронная почта
     * @return bool
     */
    protected function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Возвращает true если длина символов переданных данных короче или равна требуемой (или строго короче)
     *
     * @param $data - данные для сравнения
     * @param int $requiredLength - длинна, с которой производится сравнение
     * @param bool $strict - устанавливает насколько строгое сравнение мы используем (true - <, false - <=)
     * @return bool - true если длина символов меньше или равна требуемой (в зависимости от strict)
     */
    protected function less($data, int $requiredLength, bool $strict = false): bool
    {
        return $strict ? count($data) < $requiredLength : count($data) <= $requiredLength;
    }

    /**
     * Возвращает true если длина символов переданных данных короче или равна требуемой (или строго короче)
     *
     * @param $data - данные для сравнения
     * @param int $requiredLength - длинна, с которой производится сравнение
     * @param bool $strict - устанавливает насколько строгое сравнение мы используем (true - <, false - <=)
     * @return bool - true если длина символов превышает требуемую или равна ей (в зависимости от strict)
     */
    protected function more($data, int $requiredLength, bool $strict = false): bool
    {
        return $strict ? count($data) > $requiredLength : count($data) >= $requiredLength;
    }

    /**
     * @inheritDoc
     */
    abstract public function validate();
}