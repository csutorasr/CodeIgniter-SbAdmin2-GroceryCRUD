<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php foreach ($notifications as $notification): ?>
			<a class="dropdown-item d-flex align-items-center" href="/notifications/redirect/<?=$notification->id?>">
				<div class="mr-3">
					<div class="icon-circle bg-<?=$notification->color?>">
						<i class="fas fa-<?=$notification->icon ?: 'info'?> text-white"></i>
					</div>
				</div>
				<div>
					<div class="small text-gray-500"><?=$notification->created_date?></div>
					<span <?=$notification->seen?'':'class="font-weight-bold"'?>><?=$notification->text?></span>
				</div>
			</a>
<?php endforeach; ?>
