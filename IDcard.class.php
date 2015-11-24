<?php
	class CIDMaker	// 声明一个身份证号码检查类
	{
		var $id;
		var $err;
		var $idx = array(1,1,1,1,1,1,1,1,3,1,1,2,2,2,3,2,2,2,2,2,2,2,3,3,3,3);
		var $idy = array(0,1,2,3,4,5,6,7,4,8,9,0,1,2,5,3,4,5,6,7,8,9,0,1,2,3);

		function check($id_no)
		{
			$id_no = ucfirst($id_no); // 将英文字母转大写
			if(ereg("^[A-Z][0-9]{9}$", $id_no))
			{
				for($i=0;$i<10;$i++)
			  	$ch[$i] = substr($id_no,$i,1);
				$i = 0;
				// 将英文字母转为数字 BEGIN
                for ($char = "A"; $char != $ch[0]; $char++)
			 	 $i++;
				// 将英文字母转为数字 END

				// 导入检查公式 BEGIN
                $id = $this->idx[$i]+$this->idy[$i]*9+$ch[1]*8+$ch[2]*7+$ch[3]*6+$ch[4]*5+$ch[5]*4+$ch[6]*3+$ch[7]*2+$ch[8]*1+$ch[9]*1;
                $id = (($id % 10) == 0) ? TRUE : FALSE;
                return $id;
				// 导入检查公式 END
            }
			else
				return 0;
        }

	}

?>


