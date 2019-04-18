<?php

class Resource
{
	public function isFolder($dir, $entry)
	{
		
			echo '<li><i class="fas fa-folder"></i><a>'.$entry.'</a>
					<input type="hidden" name="adressLink" id="adressLink" class="form-control" value="'.$dir.''.$entry.'">
			</li>';

			echo '<ul>';
			if($handle = opendir($dir))
			{
					while ($entry2 = readdir($handle)) {
						if(!in_array($entry2, array(".",".."))){
							$dir2 = $dir. '/' .$entry2;

							if(is_dir($dir2))
							{
								
								$this->isFolder($dir2,$entry2);
							}
							else
							{
								echo '<li>
									<i class="fas fa-file-alt"></i>
									<a>'.$entry2.'</a>
										<input type="hidden" name="adressLink" id="adressLink" class="form-control" value="'.$dir2.'">
								</li>';

							}

						}
					}
			}
			closedir($handle);
			echo '</ul>';
	}
	public function dirToArray($oldName) {
		
		if($oldName)
		{
			$dir = str_replace(chr(92), chr(47), $oldName);
			$filelist = array();
					if($handle = opendir($dir)) {

						while($entry = readdir($handle)){

							if(!in_array($entry,array(".",".."))){

								$dir2 = $dir.'/'.$entry;
						
								if(is_dir($dir2))
								{
									$this->isFolder($dir2, $entry);

								}
								else
								{
									echo '<li><i class="fas fa-file-alt"></i><a>'.$entry.'<a/>
										<input type="hidden" name="adressLink" id="adressLink" class="form-control" value="'.$dir2.'">
									</li>';
									
								}

							}
						}
					}
					closedir($handle);			

			
		}
		return null;

	}
	public function changeFolder($dir,$nameOld,$nameNew) {

		if($handle = opendir($dir)){
			while($entry = readdir($handle)){
				if(!in_array($entry,array(".",".."))){


					$dir2 = $dir.'/'.$entry;
					$newName = $dir.'/'.str_replace($nameOld, $nameNew, $entry);
					if(rename($dir2,$newName))
					{
						$dir2 = $newName;
						if(is_dir($dir2))
						{
							$this->changeFolder($dir2,$nameOld, $nameNew);
						}
					}

				}
			}
		}
		closedir($handle);
	}
	public function changeNameFile($dirOld,$nameOld,$nameNew) {
		$dir = str_replace(chr(92), chr(47), $dirOld);

		if($handle = opendir($dir)) {

			while($entry = readdir($handle)){

		 		if(!in_array($entry,array(".",".."))){

					$dir2 = $dir.'/'.$entry;
					$newName = $dir.'/'.str_replace($nameOld, $nameNew, $entry);
					if(rename($dir2, $newName)) 
					{
						$dir2 = $newName;
						if(is_dir($dir2))
						{
							$this->changeFolder($dir2,$nameOld, $nameNew);
						}
					}
				}
			}
		 }
		 closedir($handle);
	}

	public function rmdir_recurse($path) {
		  $path = rtrim($path, '/') . '/';
		  $handle = opendir($path);

		  while (false !== ($file = readdir($handle))) {
		    if($file != '.' and $file != '..' ) {
		      $fullpath = $path.$file;
		      if (is_dir($fullpath)){
		      	 rmdir_recurse($fullpath);
		      }
		      else {
		      	unlink($fullpath);
		      }
		    }
		  }
		  closedir($handle);
		  rmdir($path);
	}

}
