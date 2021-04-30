<?php
	namespace views;
	class View 
	{
		private $path;
		public function __construct(string $path)
		{
			$this->path = $path;
		}
		
		public function renderHtml (string $templateName, array $vars=[] )
		{
			extract($vars);
			include $this->path . '/' . $templateName;
		}
	}
?>