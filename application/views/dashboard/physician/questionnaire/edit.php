<div class="heading-box">
	<h4 class=" inner-all"><?php echo $questionnaire->name; ?></h4>
</div>

<div class="form-builder">
	
	<?php echo form_open('dashboard/physician/questionnaire/saveItems'); ?>
		<input type="hidden" name="questionnaire_id" value="<?php echo $questionnaire->id; ?>" />
		<div class="form-item-list">
			<?php foreach($questions as $question){ ?>
				<div class="form-item text inner-all">
					<div class="col-xs-10">
						<input type="text" name="question[]" class="question" value="<?php echo $question->question; ?>" />
					</div>
					<div class="col-xs-1">
						<select name="type[]" class="question_type">
							<option value="1" <?php echo ($question->type==1)?'SELECTED':''; ?>>Text</option>
							<option value="2" <?php echo ($question->type==2)?'SELECTED':''; ?>>Yes/No</option>
						</select>
					</div>
					<div class="col-xs-1">
						<i class="fa fa-times pull-right"></i>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php } ?>
		</div>
		<div class="inner-all">
			<button class="submit btn blue pull-right">Save</button>
			<div class="add-form btn white pull-right">
				<i class="fa fa-plus"></i>
				<span>Add Question</span>
			</div>
			<div class="answer-option pull-right" style="display:none"">
				<label>
					<input type="radio" name="answer-type" checked="checked" data-type="text" />
				</label>
				<!--
				<label>
					<input type="radio" name="answer-type" data-type="yesno" />
					Yes/No
				</label>
				-->
			</div>
			<div class="clearfix"></div>
		</div>
	<?php echo form_close(); ?>
	
	
	<div class="clone form-item text inner-all" style="display:none">
		<div class="col-xs-10">
			<input type="text" name="question[]" class="question" placeholder="Question goes here..." />
		</div>
		<div class="col-xs-1">
			<select name="type[]" class="question_type">
				<option value="1">Text</option>
				<option value="2">Yes/No</option>
			</select>
		</div>
		<div class="col-xs-1">
			<i class="fa fa-times pull-right"></i>
		</div>
		<div class="clearfix"></div>
	</div>
	
</div>