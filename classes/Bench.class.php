<?php
	/**
	 * Простой класс для замера скорости выполнения блока кода
	 *
	 * В начале блока создаем объект, в конце вызываем метод end
	 * @author nicky
	 */
	class Bench {
		/** @type float Время старта */
		private $start_time = 0;
		/** @type float Время окончания */
		private $end_time = 0;
		
		/**
		 * Bench
		 *
		 * Взводит начальное время при создании объекта
		 *
		 * @example $b = new Bench();
		 */
		public function __construct () {
			$this->start_time = microtime(true);
		}
		
		/**
		 * Окончательный метод, инициализирует время окончания, расчитывает разницу
		 * Форматирует и выдает
		 *
		 * @example $b->end();
		 *
		 * @param boolean $debug параметр отвечает, окружать ли результат в pre и выводить его сразу
		 *
		 * @return float Время выполнения блока
		 */
		public function end($debug=true) {
			$this->end_time = microtime(true);
			$time = $this->end_time - $this->start_time;
			$time = number_format($time, 10, '.', '');
			if ( $debug ) {
				$res = '<pre>'.print_r($time,true).'</pre><br/>';
				echo $res.PHP_EOL;
			} else {
				return $time;
			}
		}
	}
?>