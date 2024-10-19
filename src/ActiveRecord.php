<?php

namespace  crackitsoft\helpers;

use crackitsoft\helpers\traits\Keygen;
use crackitsoft\helpers\traits\Status;
use crackitsoft\helpers\behaviors\Delete;
use crackitsoft\helpers\behaviors\Creator;

class ActiveRecord extends \yii\db\ActiveRecord
{
	use Keygen;
	use Status;
	public $recordStatus;
	public function behaviors()
	{
		if ($this->tableName() == "{{%active_record}}") {
			return parent::behaviors();
		} else {
			$behaviors = [
				Delete::class,
				Creator::class,
			];
			if ($this->hasAttribute('created_at') && $this->hasAttribute('updated_at')) {
				$behaviors[] = \yii\behaviors\TimestampBehavior::class;
			}

			return array_merge(parent::behaviors(), $behaviors);
		}
	}
	public function afterFind()
	{
		if ($this->hasAttribute('status')) {
			$status = ($this->is_deleted == 1) ? $this->is_deleted : $this->status;
			$this->recordStatus = $this->loadStatus($status);
		}
		return parent::afterFind();
	}
}
