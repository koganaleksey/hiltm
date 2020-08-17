<?php
/**
* 
*/
class Validator
{

	protected $errorHandler;
	protected $rules = ['required', 'minlength', 'maxlength', 'email'];
	public $messages = [
	'required' => 'Поле не должно быть пустым',
	'minlength' => 'Мало символов в поле',
	'maxlength' => 'Слишком много символов в поле',
	'email' => 'Не корректная почта',
	'float' => 'Поле должен быть с номером'
	];
	
	function __construct(ErrorHandler $errorHandler)
	{
		$this->errorHandler = $errorHandler;
	}


	public function check($items, $rules)
	{
			foreach($items as $item => $value)
			{
			    if(in_array($item, array_keys($rules)))
			    {
			    	$this->validate([
			    		'field' => $item,
			    		'value' => $value,
			    		'rules' => $rules[$item]

			    	]);
			    }

			}
			return $this;
	}


	public function fails()
	{
		return $this->errorHandler->hasErrors();
	}


	public function errors()
	{
		return $this->errorHandler;
	}

	protected function validate($item)
	{
		$field = $item['field'];

		foreach ($item['rules'] as $rule => $satisifer) {
			if(in_array($rule, $this->rules))
			{
				if(!call_user_func_array([$this, $rule], [$field, $item['value'], $satisifer]))
				{
					$this->errorHandler->addError(
						str_replace([':field', ':satisifer'], [$field, $satisifer], $this->messages[$rule]),
						$field
					);

				}

			}
		}
	}



	protected function required($field, $value, $satisifer)
	{
		return !empty(trim($value));

	}

	protected function minlength($field, $value, $satisifer)
	{
		return mb_strlen($value) >= $satisifer;

	}

	protected function maxlength($field, $value, $satisifer)
	{
		return mb_strlen($value) <= $satisifer;

	}

	protected function email($field, $value, $satisifer)
	{
		return filter_var($value, FILTER_VALIDATE_EMAIL);

	}

	protected function float($field, $value, $satisifer)
	{
		return filter_var($value, FILTER_VALIDATE_FLOAT);

	}


}

?>