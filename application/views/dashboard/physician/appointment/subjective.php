<div class="form_div _topnav">
	<div class="simple_tabs">
		<span class="active tab-open" data-tab-id="subjective">Subjective</span>
		<span class="tab-open" data-tab-id="objective">Objective</span>
		<span class="tab-open" data-tab-id="assessment">Assessment</span>
		<span class="tab-open" data-tab-id="plan">Plan</span>
	</div>
</div>

<!----------------
	Subjective
------------------>
<div id="subjective" class="active">
	<div class="form_div">
		<div class="inner-all">
		
			<span class="form_label">Chief Complaint</span>
			<textarea class="form_textarea" placeholder="Type in Chief Complaint"></textarea>
			
			<span class="form_label">History of Present Illness</span>
			<textarea class="form_textarea" placeholder="Type in History of Present Illness"></textarea>
			
			<h2 class="form_heading">
				<input type="checkbox" class="form_check replace" id="check_all" name="check_all" />
				<label for="check_all" class="check_all_image"><i class="fa fa-check-square-o"></i></label>
				Review of systems
			</h2>
			
			<div class="yesno_box constitutional_symptoms">
				<div class="heading">
					<input type="checkbox" class="form_check replace sub" id="constitutional_symptoms" name="constitutional_symptoms" />
					<label for="constitutional_symptoms" class="check_allSUB_image"><i class="fa fa-check-square-o"></i></label>
					<span>Constitutional Symptoms</span>
					<span class="accords pull-right" data-id="cs"><i class="fa fa-chevron-down"></i></span>
				</div>
				
				<div class="accords_box" id="cs">
					<table>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="anorexia_yes" name="anorexia" />
								<input type="radio" class="replace no yes_no" id="anorexia_no" name="anorexia" />
								<label for="anorexia_yes" class="anorexia_yes"><i class="fa fa-plus"></i></label>
								<label for="anorexia_no" class="anorexia_no"><i class="fa fa-minus"></i></label>
								<span>Anorexia/Appetite Loss</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="itch_yes" name="itch" />
								<input type="radio" class="replace no yes_no" id="itch_no" name="itch" />
								<label for="itch_yes" class="itch_yes"><i class="fa fa-plus"></i></label>
								<label for="itch_no" class="itch_no"><i class="fa fa-minus"></i></label>
								<span>Itch/Rash</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="malaise_yes" name="malaise" />
								<input type="radio" class="replace no yes_no" id="malaise_no" name="malaise" />
								<label for="malaise_yes" class="malaise_yes"><i class="fa fa-plus"></i></label>
								<label for="malaise_no" class="malaise_no"><i class="fa fa-minus"></i></label>
								<span>Malaise</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="fever_yes" name="fever" />
								<input type="radio" class="replace no yes_no" id="fever_no" name="fever" />
								<label for="fever_yes" class="fever_yes"><i class="fa fa-plus"></i></label>
								<label for="fever_no" class="fever_no"><i class="fa fa-minus"></i></label>
								<span>Fever</span>
							</td>
						</tr>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="bleeding_yes" name="bleeding" />
								<input type="radio" class="replace no yes_no" id="bleeding_no" name="bleeding" />
								<label for="bleeding_yes" class="bleeding_yes"><i class="fa fa-plus"></i></label>
								<label for="bleeding_no" class="bleeding_no"><i class="fa fa-minus"></i></label>
								<span>Bleeding</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="weightloss_yes" name="weightloss" />
								<input type="radio" class="replace no yes_no" id="weightloss_no" name="weightloss" />
								<label for="weightloss_yes" class="weightloss_yes"><i class="fa fa-plus"></i></label>
								<label for="weightloss_no" class="weightloss_no"><i class="fa fa-minus"></i></label>
								<span>Weight Loss or Gain</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="anemia_yes" name="anemia" />
								<input type="radio" class="replace no yes_no" id="anemia_no" name="anemia" />
								<label for="anemia_yes" class="anemia_yes"><i class="fa fa-plus"></i></label>
								<label for="anemia_no" class="anemia_no"><i class="fa fa-minus"></i></label>
								<span>Anemia</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="sleeppattern_yes" name="sleeppattern" />
								<input type="radio" class="replace no yes_no" id="sleeppattern_no" name="sleeppattern" />
								<label for="sleeppattern_yes" class="sleeppattern_yes"><i class="fa fa-plus"></i></label>
								<label for="sleeppattern_no" class="sleeppattern_no"><i class="fa fa-minus"></i></label>
								<span>Changes in Sleeping Pattern</span>
							</td>
						</tr>
					</table>
				</div>
			</div>
			
			
			<div class="yesno_box heent">
				<div class="heading">
					<input type="checkbox" class="form_check replace sub" id="heent" name="heent" />
					<label for="heent" class="check_allSUB_image"><i class="fa fa-check-square-o"></i></label>
					<span>Head, Eyes, Ears, Nose, Mouth, and Throat (HEENT)</span>
					<span class="accords pull-right" data-id="_heent"><i class="fa fa-chevron-down"></i></span>
				</div>
				
				<div class="accords_box" id="_heent">
					<table>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="vertigo_yes" name="vertigo" />
								<input type="radio" class="replace no yes_no" id="vertigo_no" name="vertigo" />
								<label for="vertigo_yes" class="vertigo_yes"><i class="fa fa-plus"></i></label>
								<label for="vertigo_no" class="vertigo_no"><i class="fa fa-minus"></i></label>
								<span>Vertigo</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="blurredvision_yes" name="blurredvision" />
								<input type="radio" class="replace no yes_no" id="blurredvision_no" name="blurredvision" />
								<label for="blurredvision_yes" class="blurredvision_yes"><i class="fa fa-plus"></i></label>
								<label for="blurredvision_no" class="blurredvision_no"><i class="fa fa-minus"></i></label>
								<span>Blurred Vision</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="blindspot_yes" name="blindspot" />
								<input type="radio" class="replace no yes_no" id="blindspot_no" name="blindspot" />
								<label for="blindspot_yes" class="blindspot_yes"><i class="fa fa-plus"></i></label>
								<label for="blindspot_no" class="blindspot_no"><i class="fa fa-minus"></i></label>
								<span>Blind Spots</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="runnynose_yes" name="runnynose" />
								<input type="radio" class="replace no yes_no" id="runnynose_no" name="runnynose" />
								<label for="runnynose_yes" class="runnynose_yes"><i class="fa fa-plus"></i></label>
								<label for="runnynose_no" class="runnynose_no"><i class="fa fa-minus"></i></label>
								<span>Runny Nose</span>
							</td>
						</tr>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="colds_yes" name="colds" />
								<input type="radio" class="replace no yes_no" id="colds_no" name="colds" />
								<label for="colds_yes" class="colds_yes"><i class="fa fa-plus"></i></label>
								<label for="colds_no" class="colds_no"><i class="fa fa-minus"></i></label>
								<span>Colds</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="dentures_yes" name="dentures" />
								<input type="radio" class="replace no yes_no" id="dentures_no" name="dentures" />
								<label for="dentures_yes" class="dentures_yes"><i class="fa fa-plus"></i></label>
								<label for="dentures_no" class="dentures_no"><i class="fa fa-minus"></i></label>
								<span>Dentures</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="pain_yes" name="pain" />
								<input type="radio" class="replace no yes_no" id="pain_no" name="pain" />
								<label for="pain_yes" class="pain_yes"><i class="fa fa-plus"></i></label>
								<label for="pain_no" class="pain_no"><i class="fa fa-minus"></i></label>
								<span>Pain</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="doublevision_yes" name="doublevision" />
								<input type="radio" class="replace no yes_no" id="doublevision_no" name="doublevision" />
								<label for="doublevision_yes" class="doublevision_yes"><i class="fa fa-plus"></i></label>
								<label for="doublevision_no" class="doublevision_no"><i class="fa fa-minus"></i></label>
								<span>Double Vision</span>
							</td>
						</tr>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="floaters_yes" name="floaters" />
								<input type="radio" class="replace no yes_no" id="floaters_no" name="floaters" />
								<label for="floaters_yes" class="floaters_yes"><i class="fa fa-plus"></i></label>
								<label for="floaters_no" class="floaters_no"><i class="fa fa-minus"></i></label>
								<span>Floaters</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="sorethroat_yes" name="sorethroat" />
								<input type="radio" class="replace no yes_no" id="sorethroat_no" name="sorethroat" />
								<label for="sorethroat_yes" class="sorethroat_yes"><i class="fa fa-plus"></i></label>
								<label for="sorethroat_no" class="sorethroat_no"><i class="fa fa-minus"></i></label>
								<span>Sore Throat</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="obstruction_yes" name="obstruction" />
								<input type="radio" class="replace no yes_no" id="obstruction_no" name="obstruction" />
								<label for="obstruction_yes" class="obstruction_yes"><i class="fa fa-plus"></i></label>
								<label for="obstruction_no" class="obstruction_no"><i class="fa fa-minus"></i></label>
								<span>Obstruction</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="toothache_yes" name="toothache" />
								<input type="radio" class="replace no yes_no" id="toothache_no" name="toothache" />
								<label for="toothache_yes" class="toothache_yes"><i class="fa fa-plus"></i></label>
								<label for="toothache_no" class="toothache_no"><i class="fa fa-minus"></i></label>
								<span>Tootheache</span>
							</td>
						</tr>
					</table>
				</div>
			</div>
			
			<div class="yesno_box cardiovascular">
				<div class="heading">
					<input type="checkbox" class="form_check replace sub" id="cardiovascular" name="cardiovascular" />
					<label for="cardiovascular" class="check_allSUB_image"><i class="fa fa-check-square-o"></i></label>
					<span>Cardiovascular</span>
					<span class="accords pull-right" data-id="car"><i class="fa fa-chevron-down"></i></span>
				</div>
				
				<div class="accords_box" id="car">
					<table>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="chestpain_yes" name="chestpain" />
								<input type="radio" class="replace no yes_no" id="chestpain_no" name="chestpain" />
								<label for="chestpain_yes" class="chestpain_yes"><i class="fa fa-plus"></i></label>
								<label for="chestpain_no" class="chestpain_no"><i class="fa fa-minus"></i></label>
								<span>Chest Pain</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="arrhythmia_yes" name="arrhythmia" />
								<input type="radio" class="replace no yes_no" id="arrhythmia_no" name="arrhythmia" />
								<label for="arrhythmia_yes" class="arrhythmia_yes"><i class="fa fa-plus"></i></label>
								<label for="arrhythmia_no" class="arrhythmia_no"><i class="fa fa-minus"></i></label>
								<span>Arrhythmia</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="syncope_yes" name="syncope" />
								<input type="radio" class="replace no yes_no" id="syncope_no" name="syncope" />
								<label for="syncope_yes" class="syncope_yes"><i class="fa fa-plus"></i></label>
								<label for="syncope_no" class="syncope_no"><i class="fa fa-minus"></i></label>
								<span>Syncope</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="palpitations_yes" name="palpitations" />
								<input type="radio" class="replace no yes_no" id="palpitations_no" name="palpitations" />
								<label for="palpitations_yes" class="palpitations_yes"><i class="fa fa-plus"></i></label>
								<label for="palpitations_no" class="palpitations_no"><i class="fa fa-minus"></i></label>
								<span>Palpitations</span>
							</td>
						</tr>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="pnd_yes" name="pnd" />
								<input type="radio" class="replace no yes_no" id="pnd_no" name="pnd" />
								<label for="pnd_yes" class="pnd_yes"><i class="fa fa-plus"></i></label>
								<label for="pnd_no" class="pnd_no"><i class="fa fa-minus"></i></label>
								<span>PND</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="conciousness_yes" name="conciousness" />
								<input type="radio" class="replace no yes_no" id="conciousness_no" name="conciousness" />
								<label for="conciousness_yes" class="conciousness_yes"><i class="fa fa-plus"></i></label>
								<label for="conciousness_no" class="conciousness_no"><i class="fa fa-minus"></i></label>
								<span>Loss of Consiousness</span>
							</td>
						</tr>
					</table>
				</div>
				
			</div>
			
			<div class="yesno_box respiratory">
				<div class="heading">
					<input type="checkbox" class="form_check replace sub" id="respiratory" name="respiratory" />
					<label for="respiratory" class="check_allSUB_image"><i class="fa fa-check-square-o"></i></label>
					<span>Respiratory</span>
					<span class="accords pull-right" data-id="res"><i class="fa fa-chevron-down"></i></span>
				</div>
				
				<div class="accords_box" id="res">
					<table>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="shortnessofbreath_yes" name="shortnessofbreath" />
								<input type="radio" class="replace no yes_no" id="shortnessofbreath_no" name="shortnessofbreath" />
								<label for="shortnessofbreath_yes" class="shortnessofbreath_yes"><i class="fa fa-plus"></i></label>
								<label for="shortnessofbreath_no" class="shortnessofbreath_no"><i class="fa fa-minus"></i></label>
								<span>Shortness of Breath</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="wheezing_yes" name="wheezing" />
								<input type="radio" class="replace no yes_no" id="wheezing_no" name="wheezing" />
								<label for="wheezing_yes" class="wheezing_yes"><i class="fa fa-plus"></i></label>
								<label for="wheezing_no" class="wheezing_no"><i class="fa fa-minus"></i></label>
								<span>Wheezing</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="nonproductivecough_yes" name="nonproductivecough" />
								<input type="radio" class="replace no yes_no" id="nonproductivecough_no" name="nonproductivecough" />
								<label for="nonproductivecough_yes" class="nonproductivecough_yes"><i class="fa fa-plus"></i></label>
								<label for="nonproductivecough_no" class="nonproductivecough_no"><i class="fa fa-minus"></i></label>
								<span>Non-productive Cough</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="difficultybreathing_yes" name="difficultybreathing" />
								<input type="radio" class="replace no yes_no" id="difficultybreathing_no" name="difficultybreathing" />
								<label for="difficultybreathing_yes" class="difficultybreathing_yes"><i class="fa fa-plus"></i></label>
								<label for="difficultybreathing_no" class="difficultybreathing_no"><i class="fa fa-minus"></i></label>
								<span>Difficulty Breathing</span>
							</td>
						</tr>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="stridor_yes" name="stridor" />
								<input type="radio" class="replace no yes_no" id="stridor_no" name="stridor" />
								<label for="stridor_yes" class="stridor_yes"><i class="fa fa-plus"></i></label>
								<label for="stridor_no" class="stridor_no"><i class="fa fa-minus"></i></label>
								<span>Stridor</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="sputum_yes" name="sputum" />
								<input type="radio" class="replace no yes_no" id="sputum_no" name="sputum" />
								<label for="sputum_yes" class="sputum_yes"><i class="fa fa-plus"></i></label>
								<label for="sputum_no" class="sputum_no"><i class="fa fa-minus"></i></label>
								<span>Sputum Production</span>
							</td>
						</tr>
					</table>
				</div>
			</div>
			
			
			<div class="yesno_box gastrointestinal">
				<div class="heading">
					<input type="checkbox" class="form_check replace sub" id="gastrointestinal" name="gastrointestinal" />
					<label for="gastrointestinal" class="check_allSUB_image"><i class="fa fa-check-square-o"></i></label>
					<span>Gastrointestinal</span>
					<span class="accords pull-right" data-id="gas"><i class="fa fa-chevron-down"></i></span>
				</div>
				
				<div class="accords_box" id="gas">
					<table>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="abdominal_yes" name="abdominal" />
								<input type="radio" class="replace no yes_no" id="abdominal_no" name="abdominal" />
								<label for="abdominal_yes" class="abdominal_yes"><i class="fa fa-plus"></i></label>
								<label for="abdominal_no" class="abdominal_no"><i class="fa fa-minus"></i></label>
								<span>Abdominal Plan</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="haematemesis_yes" name="haematemesis" />
								<input type="radio" class="replace no yes_no" id="haematemesis_no" name="haematemesis" />
								<label for="haematemesis_yes" class="haematemesis_yes"><i class="fa fa-plus"></i></label>
								<label for="haematemesis_no" class="haematemesis_no"><i class="fa fa-minus"></i></label>
								<span>Haematemesis</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="diarrhea_yes" name="diarrhea" />
								<input type="radio" class="replace no yes_no" id="diarrhea_no" name="diarrhea" />
								<label for="diarrhea_yes" class="diarrhea_yes"><i class="fa fa-plus"></i></label>
								<label for="diarrhea_no" class="diarrhea_no"><i class="fa fa-minus"></i></label>
								<span>Diarrhea</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="nausea_yes" name="nausea" />
								<input type="radio" class="replace no yes_no" id="nausea_no" name="nausea" />
								<label for="nausea_yes" class="nausea_yes"><i class="fa fa-plus"></i></label>
								<label for="nausea_no" class="nausea_no"><i class="fa fa-minus"></i></label>
								<span>Nausea</span>
							</td>
						</tr>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="cramping_yes" name="cramping" />
								<input type="radio" class="replace no yes_no" id="cramping_no" name="cramping" />
								<label for="cramping_yes" class="cramping_yes"><i class="fa fa-plus"></i></label>
								<label for="cramping_no" class="cramping_no"><i class="fa fa-minus"></i></label>
								<span>Cramping</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="jaundice_yes" name="jaundice" />
								<input type="radio" class="replace no yes_no" id="jaundice_no" name="jaundice" />
								<label for="jaundice_yes" class="jaundice_yes"><i class="fa fa-plus"></i></label>
								<label for="jaundice_no" class="jaundice_no"><i class="fa fa-minus"></i></label>
								<span>Jaundice</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="contipation_yes" name="contipation" />
								<input type="radio" class="replace no yes_no" id="contipation_no" name="contipation" />
								<label for="contipation_yes" class="contipation_yes"><i class="fa fa-plus"></i></label>
								<label for="contipation_no" class="contipation_no"><i class="fa fa-minus"></i></label>
								<span>Constipation</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="vomiting_yes" name="vomiting" />
								<input type="radio" class="replace no yes_no" id="vomiting_no" name="vomiting" />
								<label for="vomiting_yes" class="vomiting_yes"><i class="fa fa-plus"></i></label>
								<label for="vomiting_no" class="vomiting_no"><i class="fa fa-minus"></i></label>
								<span>Vomiting</span>
							</td>
						</tr>
					</table>
				</div>
				
			</div>
			
			
			<div class="yesno_box urinary">
				<div class="heading">
					<input type="checkbox" class="form_check replace sub" id="urinary" name="urinary" />
					<label for="urinary" class="check_allSUB_image"><i class="fa fa-check-square-o"></i></label>
					<span>Urinary</span>
					<span class="accords pull-right" data-id="uri"><i class="fa fa-chevron-down"></i></span>
				</div>
				
				<div class="accords_box" id="uri">
					<table>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="incontinence_yes" name="incontinence" />
								<input type="radio" class="replace no yes_no" id="incontinence_no" name="incontinence" />
								<label for="incontinence_yes" class="incontinence_yes"><i class="fa fa-plus"></i></label>
								<label for="incontinence_no" class="incontinence_no"><i class="fa fa-minus"></i></label>
								<span>Incontinence</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="terminaldribbling_yes" name="terminaldribbling" />
								<input type="radio" class="replace no yes_no" id="terminaldribbling_no" name="terminaldribbling" />
								<label for="terminaldribbling_yes" class="terminaldribbling_yes"><i class="fa fa-plus"></i></label>
								<label for="terminaldribbling_no" class="terminaldribbling_no"><i class="fa fa-minus"></i></label>
								<span>Terminal Dribblin</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="dysuria_yes" name="dysuria" />
								<input type="radio" class="replace no yes_no" id="dysuria_no" name="dysuria" />
								<label for="dysuria_yes" class="dysuria_yes"><i class="fa fa-plus"></i></label>
								<label for="dysuria_no" class="dysuria_no"><i class="fa fa-minus"></i></label>
								<span>Dysuria</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="polyuria_yes" name="polyuria" />
								<input type="radio" class="replace no yes_no" id="polyuria_no" name="polyuria" />
								<label for="polyuria_yes" class="polyuria_yes"><i class="fa fa-plus"></i></label>
								<label for="polyuria_no" class="polyuria_no"><i class="fa fa-minus"></i></label>
								<span>Polyuria</span>
							</td>
						</tr>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="discharge_yes" name="discharge" />
								<input type="radio" class="replace no yes_no" id="discharge_no" name="discharge" />
								<label for="discharge_yes" class="discharge_yes"><i class="fa fa-plus"></i></label>
								<label for="discharge_no" class="discharge_no"><i class="fa fa-minus"></i></label>
								<span>Discharge</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="nocturia_yes" name="nocturia" />
								<input type="radio" class="replace no yes_no" id="nocturia_no" name="nocturia" />
								<label for="nocturia_yes" class="nocturia_yes"><i class="fa fa-plus"></i></label>
								<label for="nocturia_no" class="nocturia_no"><i class="fa fa-minus"></i></label>
								<span>Nocturia</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="hematuria_yes" name="hematuria" />
								<input type="radio" class="replace no yes_no" id="hematuria_no" name="hematuria" />
								<label for="hematuria_yes" class="hematuria_yes"><i class="fa fa-plus"></i></label>
								<label for="hematuria_no" class="hematuria_no"><i class="fa fa-minus"></i></label>
								<span>Hematuria</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="colorofurine_yes" name="colorofurine" />
								<input type="radio" class="replace no yes_no" id="colorofurine_no" name="colorofurine" />
								<label for="colorofurine_yes" class="colorofurine_yes"><i class="fa fa-plus"></i></label>
								<label for="colorofurine_no" class="colorofurine_no"><i class="fa fa-minus"></i></label>
								<span>Unusual Change in Color or Urine</span>
							</td>
						</tr>
					</table>
				</div>
				
			</div>
			
			
			<div class="yesno_box genitalreproductive">
				<div class="heading">
					<input type="checkbox" class="form_check replace sub" id="genitalreproductive" name="genitalreproductive" />
					<label for="genitalreproductive" class="check_allSUB_image"><i class="fa fa-check-square-o"></i></label>
					<span>Genital/Reproductive</span>
					<span class="accords pull-right" data-id="gr"><i class="fa fa-chevron-down"></i></span>
				</div>
				
				<div class="accords_box" id="gr">
					<table>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="gr_pain_yes" name="gr_pain" />
								<input type="radio" class="replace no yes_no" id="gr_pain_no" name="gr_pain" />
								<label for="gr_pain_yes" class="gr_pain_yes"><i class="fa fa-plus"></i></label>
								<label for="gr_pain_no" class="gr_pain_no"><i class="fa fa-minus"></i></label>
								<span>Pain</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="menopausal_yes" name="menopausal" />
								<input type="radio" class="replace no yes_no" id="menopausal_no" name="menopausal" />
								<label for="menopausal_yes" class="menopausal_yes"><i class="fa fa-plus"></i></label>
								<label for="menopausal_no" class="menopausal_no"><i class="fa fa-minus"></i></label>
								<span>Post-Menopausal Bleeding</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="gr_sores_yes" name="gr_sores" />
								<input type="radio" class="replace no yes_no" id="gr_sores_no" name="gr_sores" />
								<label for="gr_sores_yes" class="gr_sores_yes"><i class="fa fa-plus"></i></label>
								<label for="gr_sores_no" class="gr_sores_no"><i class="fa fa-minus"></i></label>
								<span>Sores</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="gr_itch_yes" name="gr_itch" />
								<input type="radio" class="replace no yes_no" id="gr_itch_no" name="gr_itch" />
								<label for="gr_itch_yes" class="gr_itch_yes"><i class="fa fa-plus"></i></label>
								<label for="gr_itch_no" class="gr_itch_no"><i class="fa fa-minus"></i></label>
								<span>Itch/Rash</span>
							</td>
						</tr>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="gr_masses_yes" name="gr_masses" />
								<input type="radio" class="replace no yes_no" id="gr_masses_no" name="gr_masses" />
								<label for="gr_masses_yes" class="gr_masses_yes"><i class="fa fa-plus"></i></label>
								<label for="gr_masses_no" class="gr_masses_no"><i class="fa fa-minus"></i></label>
								<span>Masses</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="gr_bleeding_yes" name="gr_bleeding" />
								<input type="radio" class="replace no yes_no" id="gr_bleeding_no" name="gr_bleeding" />
								<label for="gr_bleeding_yes" class="gr_bleeding_yes"><i class="fa fa-plus"></i></label>
								<label for="gr_bleeding_no" class="gr_bleeding_no"><i class="fa fa-minus"></i></label>
								<span>Bleeding</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="secondarysexdev_yes" name="secondarysexdev" />
								<input type="radio" class="replace no yes_no" id="secondarysexdev_no" name="secondarysexdev" />
								<label for="secondarysexdev_yes" class="secondarysexdev_yes"><i class="fa fa-plus"></i></label>
								<label for="secondarysexdev_no" class="secondarysexdev_no"><i class="fa fa-minus"></i></label>
								<span>Secondary Sexual Development</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="dysmenorrhea_yes" name="dysmenorrhea" />
								<input type="radio" class="replace no yes_no" id="dysmenorrhea_no" name="dysmenorrhea" />
								<label for="dysmenorrhea_yes" class="dysmenorrhea_yes"><i class="fa fa-plus"></i></label>
								<label for="dysmenorrhea_no" class="dysmenorrhea_no"><i class="fa fa-minus"></i></label>
								<span>Dysmenorrhea</span>
							</td>
						</tr>
					</table>
				</div>
				
			</div>
			
			
			<div class="yesno_box musculoskeletal">
				<div class="heading">
					<input type="checkbox" class="form_check replace sub" id="musculoskeletal" name="musculoskeletal" />
					<label for="musculoskeletal" class="check_allSUB_image"><i class="fa fa-check-square-o"></i></label>
					<span>Musculo Skeletal</span>
					<span class="accords pull-right" data-id="ms"><i class="fa fa-chevron-down"></i></span>
				</div>
				
				<div class="accords_box" id="ms">
					<table>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="ms_pain_yes" name="ms_pain" />
								<input type="radio" class="replace no yes_no" id="ms_pain_no" name="ms_pain" />
								<label for="ms_pain_yes" class="ms_pain_yes"><i class="fa fa-plus"></i></label>
								<label for="ms_pain_no" class="ms_pain_no"><i class="fa fa-minus"></i></label>
								<span>Pain</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="localweakness_yes" name="localweakness" />
								<input type="radio" class="replace no yes_no" id="localweakness_no" name="localweakness" />
								<label for="localweakness_yes" class="localweakness_yes"><i class="fa fa-plus"></i></label>
								<label for="localweakness_no" class="localweakness_no"><i class="fa fa-minus"></i></label>
								<span>Localized Weakness</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="jointswelling_yes" name="jointswelling" />
								<input type="radio" class="replace no yes_no" id="jointswelling_no" name="jointswelling" />
								<label for="jointswelling_yes" class="jointswelling_yes"><i class="fa fa-plus"></i></label>
								<label for="jointswelling_no" class="jointswelling_no"><i class="fa fa-minus"></i></label>
								<span>Joint Swelling</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="ms_cramps_yes" name="ms_cramps" />
								<input type="radio" class="replace no yes_no" id="ms_cramps_no" name="ms_cramps" />
								<label for="ms_cramps_yes" class="ms_cramps_yes"><i class="fa fa-plus"></i></label>
								<label for="ms_cramps_no" class="ms_cramps_no"><i class="fa fa-minus"></i></label>
								<span>Cramps</span>
							</td>
						</tr>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="ms_stiffness_yes" name="ms_stiffness" />
								<input type="radio" class="replace no yes_no" id="ms_stiffness_no" name="ms_stiffness" />
								<label for="ms_stiffness_yes" class="ms_stiffness_yes"><i class="fa fa-plus"></i></label>
								<label for="ms_stiffness_no" class="ms_stiffness_no"><i class="fa fa-minus"></i></label>
								<span>Stiffness</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="crepitus_yes" name="crepitus" />
								<input type="radio" class="replace no yes_no" id="crepitus_no" name="crepitus" />
								<label for="crepitus_yes" class="crepitus_yes"><i class="fa fa-plus"></i></label>
								<label for="crepitus_no" class="crepitus_no"><i class="fa fa-minus"></i></label>
								<span>Crepitus</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="atrophy_yes" name="atrophy" />
								<input type="radio" class="replace no yes_no" id="atrophy_no" name="atrophy" />
								<label for="atrophy_yes" class="atrophy_yes"><i class="fa fa-plus"></i></label>
								<label for="atrophy_no" class="atrophy_no"><i class="fa fa-minus"></i></label>
								<span>Atrophy</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="edema_yes" name="edema" />
								<input type="radio" class="replace no yes_no" id="edema_no" name="edema" />
								<label for="edema_yes" class="edema_yes"><i class="fa fa-plus"></i></label>
								<label for="edema_no" class="edema_no"><i class="fa fa-minus"></i></label>
								<span>Edema</span>
							</td>
						</tr>
					</table>
				</div>
				
			</div>
			
			
			<div class="yesno_box integumentary">
				<div class="heading">
					<input type="checkbox" class="form_check replace sub" id="integumentary" name="integumentary" />
					<label for="integumentary" class="check_allSUB_image"><i class="fa fa-check-square-o"></i></label>
					<span>Integumentary</span>
					<span class="accords pull-right" data-id="int"><i class="fa fa-chevron-down"></i></span>
				</div>
				
				<div class="accords_box" id="int">
					<table>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="pruritus_yes" name="pruritus" />
								<input type="radio" class="replace no yes_no" id="pruritus_no" name="pruritus" />
								<label for="pruritus_yes" class="pruritus_yes"><i class="fa fa-plus"></i></label>
								<label for="pruritus_no" class="pruritus_no"><i class="fa fa-minus"></i></label>
								<span>Pruritus</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="eczema_yes" name="eczema" />
								<input type="radio" class="replace no yes_no" id="eczema_no" name="eczema" />
								<label for="eczema_yes" class="eczema_yes"><i class="fa fa-plus"></i></label>
								<label for="eczema_no" class="eczema_no"><i class="fa fa-minus"></i></label>
								<span>Eczema</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="nodules_yes" name="nodules" />
								<input type="radio" class="replace no yes_no" id="nodules_no" name="nodules" />
								<label for="nodules_yes" class="nodules_yes"><i class="fa fa-plus"></i></label>
								<label for="nodules_no" class="nodules_no"><i class="fa fa-minus"></i></label>
								<span>Nodules</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="incisions_yes" name="incisions" />
								<input type="radio" class="replace no yes_no" id="incisions_no" name="incisions" />
								<label for="incisions_yes" class="incisions_yes"><i class="fa fa-plus"></i></label>
								<label for="incisions_no" class="incisions_no"><i class="fa fa-minus"></i></label>
								<span>Incisions</span>
							</td>
						</tr>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="lesions_yes" name="lesions" />
								<input type="radio" class="replace no yes_no" id="lesions_no" name="lesions" />
								<label for="lesions_yes" class="lesions_yes"><i class="fa fa-plus"></i></label>
								<label for="lesions_no" class="lesions_no"><i class="fa fa-minus"></i></label>
								<span>Lesions</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="int_rashes_yes" name="int_rashes" />
								<input type="radio" class="replace no yes_no" id="int_rashes_no" name="int_rashes" />
								<label for="int_rashes_yes" class="int_rashes_yes"><i class="fa fa-plus"></i></label>
								<label for="int_rashes_no" class="int_rashes_no"><i class="fa fa-minus"></i></label>
								<span>Rashes</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="discoloration_yes" name="discoloration" />
								<input type="radio" class="replace no yes_no" id="discoloration_no" name="discoloration" />
								<label for="discoloration_yes" class="discoloration_yes"><i class="fa fa-plus"></i></label>
								<label for="discoloration_no" class="discoloration_no"><i class="fa fa-minus"></i></label>
								<span>Discoloration</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="pallor_yes" name="pallor" />
								<input type="radio" class="replace no yes_no" id="pallor_no" name="pallor" />
								<label for="pallor_yes" class="pallor_yes"><i class="fa fa-plus"></i></label>
								<label for="pallor_no" class="pallor_no"><i class="fa fa-minus"></i></label>
								<span>Pallor</span>
							</td>
						</tr>
					</table>
				</div>
				
			</div>
			
			
			<div class="yesno_box neurologic">
				<div class="heading">
					<input type="checkbox" class="form_check replace sub" id="neurologic" name="neurologic" />
					<label for="neurologic" class="check_allSUB_image"><i class="fa fa-check-square-o"></i></label>
					<span>Neurologic</span>
					<span class="accords pull-right" data-id="neu"><i class="fa fa-chevron-down"></i></span>
				</div>
				
				<div class="accords_box" id="neu">
					<table>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="seizures_yes" name="seizures" />
								<input type="radio" class="replace no yes_no" id="seizures_no" name="seizures" />
								<label for="seizures_yes" class="seizures_yes"><i class="fa fa-plus"></i></label>
								<label for="seizures_no" class="seizures_no"><i class="fa fa-minus"></i></label>
								<span>Seizures</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="limbweakness_yes" name="limbweakness" />
								<input type="radio" class="replace no yes_no" id="limbweakness_no" name="limbweakness" />
								<label for="limbweakness_yes" class="limbweakness_yes"><i class="fa fa-plus"></i></label>
								<label for="limbweakness_no" class="limbweakness_no"><i class="fa fa-minus"></i></label>
								<span>Limb Weakness</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="paresthesias_yes" name="paresthesias" />
								<input type="radio" class="replace no yes_no" id="paresthesias_no" name="paresthesias" />
								<label for="paresthesias_yes" class="paresthesias_yes"><i class="fa fa-plus"></i></label>
								<label for="paresthesias_no" class="paresthesias_no"><i class="fa fa-minus"></i></label>
								<span>Paresthesias</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="poorbalance_yes" name="poorbalance" />
								<input type="radio" class="replace no yes_no" id="poorbalance_no" name="poorbalance" />
								<label for="poorbalance_yes" class="poorbalance_yes"><i class="fa fa-plus"></i></label>
								<label for="poorbalance_no" class="poorbalance_no"><i class="fa fa-minus"></i></label>
								<span>Poor Balance</span>
							</td>
						</tr>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="paralysis_yes" name="paralysis" />
								<input type="radio" class="replace no yes_no" id="paralysis_no" name="paralysis" />
								<label for="paralysis_yes" class="paralysis_yes"><i class="fa fa-plus"></i></label>
								<label for="paralysis_no" class="paralysis_no"><i class="fa fa-minus"></i></label>
								<span>Paralysis</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="cognitivedeficit_yes" name="cognitivedeficit" />
								<input type="radio" class="replace no yes_no" id="cognitivedeficit_no" name="cognitivedeficit" />
								<label for="cognitivedeficit_yes" class="cognitivedeficit_yes"><i class="fa fa-plus"></i></label>
								<label for="cognitivedeficit_no" class="cognitivedeficit_no"><i class="fa fa-minus"></i></label>
								<span>Cognitive Deficit</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="speechproblem_yes" name="speechproblem" />
								<input type="radio" class="replace no yes_no" id="speechproblem_no" name="speechproblem" />
								<label for="speechproblem_yes" class="speechproblem_yes"><i class="fa fa-plus"></i></label>
								<label for="speechproblem_no" class="speechproblem_no"><i class="fa fa-minus"></i></label>
								<span>Speech Problem</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="changesensorium_yes" name="changesensorium" />
								<input type="radio" class="replace no yes_no" id="changesensorium_no" name="changesensorium" />
								<label for="changesensorium_yes" class="changesensorium_yes"><i class="fa fa-plus"></i></label>
								<label for="changesensorium_no" class="changesensorium_no"><i class="fa fa-minus"></i></label>
								<span>Change in Sensorium</span>
							</td>
						</tr>
					</table>
				</div>
				
			</div>
			
			
			<div class="yesno_box psychiatric border-bottom">
				<div class="heading">
					<input type="checkbox" class="form_check replace sub" id="psychiatric" name="psychiatric" />
					<label for="psychiatric" class="check_allSUB_image"><i class="fa fa-check-square-o"></i></label>
					<span>Psychiatric</span>
					<span class="accords pull-right" data-id="psy"><i class="fa fa-chevron-down"></i></span>
				</div>
				
				<div class="accords_box" id="psy">
					<table>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="depression_yes" name="depression" />
								<input type="radio" class="replace no yes_no" id="depression_no" name="depression" />
								<label for="depression_yes" class="depression_yes"><i class="fa fa-plus"></i></label>
								<label for="depression_no" class="depression_no"><i class="fa fa-minus"></i></label>
								<span>Despression</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="bipolardisorder_yes" name="bipolardisorder" />
								<input type="radio" class="replace no yes_no" id="bipolardisorder_no" name="bipolardisorder" />
								<label for="bipolardisorder_yes" class="bipolardisorder_yes"><i class="fa fa-plus"></i></label>
								<label for="bipolardisorder_no" class="bipolardisorder_no"><i class="fa fa-minus"></i></label>
								<span>Bipolar Disorder</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="ptsd_yes" name="ptsd" />
								<input type="radio" class="replace no yes_no" id="ptsd_no" name="ptsd" />
								<label for="ptsd_yes" class="ptsd_yes"><i class="fa fa-plus"></i></label>
								<label for="ptsd_no" class="ptsd_no"><i class="fa fa-minus"></i></label>
								<span>PTSD</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="suicidalideations_yes" name="suicidalideations" />
								<input type="radio" class="replace no yes_no" id="suicidalideations_no" name="suicidalideations" />
								<label for="suicidalideations_yes" class="suicidalideations_yes"><i class="fa fa-plus"></i></label>
								<label for="suicidalideations_no" class="suicidalideations_no"><i class="fa fa-minus"></i></label>
								<span>Suicidal Ideations</span>
							</td>
						</tr>
						<tr class="odd">
							<td>
								<input type="radio" class="replace yes yes_no" id="hallucinations_yes" name="hallucinations" />
								<input type="radio" class="replace no yes_no" id="hallucinations_no" name="hallucinations" />
								<label for="hallucinations_yes" class="hallucinations_yes"><i class="fa fa-plus"></i></label>
								<label for="hallucinations_no" class="hallucinations_no"><i class="fa fa-minus"></i></label>
								<span>Hallucinations</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="anxiety_yes" name="anxiety" />
								<input type="radio" class="replace no yes_no" id="anxiety_no" name="anxiety" />
								<label for="anxiety_yes" class="anxiety_yes"><i class="fa fa-plus"></i></label>
								<label for="anxiety_no" class="anxiety_no"><i class="fa fa-minus"></i></label>
								<span>Anxiety</span>
							</td>
						</tr>
						<tr class="even">
							<td>
								<input type="radio" class="replace yes yes_no" id="personalitydisorder_yes" name="personalitydisorder" />
								<input type="radio" class="replace no yes_no" id="personalitydisorder_no" name="personalitydisorder" />
								<label for="personalitydisorder_yes" class="personalitydisorder_yes"><i class="fa fa-plus"></i></label>
								<label for="personalitydisorder_no" class="personalitydisorder_no"><i class="fa fa-minus"></i></label>
								<span>Personality Disorder</span>
							</td>
							<td>
								<input type="radio" class="replace yes yes_no" id="emotionalproblems_yes" name="emotionalproblems" />
								<input type="radio" class="replace no yes_no" id="emotionalproblems_no" name="emotionalproblems" />
								<label for="emotionalproblems_yes" class="emotionalproblems_yes"><i class="fa fa-plus"></i></label>
								<label for="emotionalproblems_no" class="emotionalproblems_no"><i class="fa fa-minus"></i></label>
								<span>Emotional Problems</span>
							</td>
						</tr>
					</table>
				</div>
				
			</div>
			
			<br>
			
			<span class="form_label">Remarks</span>
			<textarea class="form_textarea" placeholder="Type in Remarks"></textarea>
			
			<button class="form_button btn blue">Save</button>
			
		</div>
	</div>

	<div class="form_div allergies_box">
		<div class="inner-all">
			<h2 class="form_heading">Allergies</h2>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Anesthetic Agents</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Animal Hair</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Cockroaches</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Cosmetic</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Crustaceans</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Dust Mite</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Egg</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Fish</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Fruits</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Household Cleansers</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Insect Stings</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Latext</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Milk</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Molds</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Nickel</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>NSAIDS</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Nuts</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Penicillin</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Pollen</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Sesame seeds</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Shampoos</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Shelffish</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Soaps</span>
			</label>
			<label class="allergy col-sm-4">
				<input type="checkbox" class="form_checkbox"  />
				<span>Sulfa Drugs</span>
			</label>
			<div class="clearfix"></div>
			
			<div class="form_group allergy_search">
				<input type="text" class="form_text left search_text" placeholder="Search for drugs and other allergies" data-target="allergies_result_box">
				<span class="form_group_icon right"><i class="fa fa-search"></i></span>
			</div>
			<div class="allergies_result_box search_display_box"></div>
			
			<span class="form_label">Others Medications</span>
			<textarea class="form_textarea" placeholder="Type in Other Medications"></textarea>
			
			<button class="form_button btn blue">Update</button>
			<div class="clearfix"></div>
		</div>
	</div>



	<div class="form_div cm_box">
		<div class="inner-all">
			<h2 class="form_heading">Current Medications</h2>
			<div class="form_group medicine_search">
				<input type="text" class="form_text left search_text" placeholder="Search Medicines" data-target="medicines_box" />
				<span class="form_group_icon right"><i class="fa fa-search"></i></span>
			</div>
			<div class="medicines_box search_display_box"></div>
			
			<span class="form_label">Other Medications</span>
			<textarea class="form_textarea" placeholder="Type in Other Medications"></textarea>
			
			<span class="form_label">Remarks</span>
			<textarea class="form_textarea" placeholder="Type in Remarks"></textarea>
			
			<button class="form_button btn blue">Update</button>
		</div>
	</div>


	<div class="form_div mch_box">
		<div class="inner-all">
			<h2 class="form_heading">
				Medical Condition History
				<button class="btn blue pull-right">Update</button>
			</h2>
			<table>
				<thead>
					<tr>
						<td><span>Medical Condition</span></td>
						<td><span>Status</span></td>
						<td><span>Date</span></td>
						<td><span>Remarks</span></td>
					</tr>
				</thead>
				<tbody>
					<tr class="odd">
						<td><span>Anemia</span></td>
						<td><span></span></td>
						<td><span></span></td>
						<td><span></span></td>
					</tr>
					<tr class="even">
						<td><span>Cancer</span></td>
						<td><span>Resolved</span></td>
						<td><span></span></td>
						<td><span></span></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>


	<div class="form_div surgical_box">
		<div class="inner-all">
			<h2 class="form_heading">
				Surgical History
				<button class="btn blue pull-right">Update</button>
			</h2>
		</div>
	</div>


	<div class="form_div pash_box">
		<div class="inner-all">
			<h2 class="form_heading">
				Personal and Social History
				<button class="btn blue pull-right">Update</button>
			</h2>
		</div>
	</div>


	<div class="form_div fhh_box">
		<div class="inner-all">
			<h2 class="form_heading">
				Family Health History
				<button class="btn blue pull-right">Update</button>
			</h2>
		</div>
	</div>
</div>



<!----------------
	Objective
------------------>
<div id="objective" style="display:none">
	<div class="form_div vital_sign">
		<div class="inner-all">
			<h2 class="form_heading">Vital Signs</h2>
			
			<div class="vitals_box">
				<input type="hidden" value="1" id="vital_count">
				<div class="vitals v1">
					<div class="inner-all">
						<div class="form_group">
							<div class="col-sm-6">
								<div class="innerR">
									<span class="form_label">Date | Time</span>
									<input type="text" class="form_text" />
								</div>
							</div>
							<div class="col-sm-6">
								<div class="innerR">
									<span class="form_label">Mental Status</span>
									<select class="form_select">
										<option>Select</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="form_group">
							<div class="col-sm-6">
								<div class="innerR">
									<span class="form_label">BP</span>
									<input type="text" class="form_text half" />
									<span class="bp_over">/</span>
									<input type="text" class="form_text half" />
								</div>
							</div>
							<div class="col-sm-6">
								<div class="innerR">
									<span class="form_label">PR</span>
									<input type="text" class="form_text" />
								</div>
							</div>
						</div>
						
						<div class="form_group">
							<div class="col-sm-4">
								<div class="innerR">
									<span class="form_label">Temp</span>
									<input type="text" class="form_text" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="innerR">
									<span class="form_label">RR</span>
									<input type="text" class="form_text" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="innerR">
									<span class="form_label">Pain Scale </span>
									<div class="form_group">
										<input type="text" class="form_text left pain_scale_text" />
										<span class="form_group_icon right"><i class="fa fa-edit pain_scale lightbox-mode" data-target="pain_scale_lb"></i></span>
										
									</div>
								</div>
							</div>
						</div>
						
						<span class="form_label">Notes</span>
						<textarea class="form_textarea" placeholder="Type in Notes"></textarea>
						
						<span class="form_label">Taken by</span>
						<input type="text" class="form_text" />
					</div>
				</div>
			</div>
			
			<button class="form_button btn blue">Save</button>
			<button class="form_button btn red add_vitals"><i class="fa fa-plus"></i>Add</button>
		</div>
	</div>


	<div class="form_div diagnostic_results">
		<div class="inner-all">
			<h2 class="form_heading">
				General Physical Examination
			</h2>
			
			<div class="form_label with_action">
				<span>General Appearance</span>
				<button class="btn blue pull-right pre_fill_btn" data-target="ga"><i class="fa fa-check-square-o"></i></button>
				<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
				<div class="clear"></div>
			</div>
			<textarea class="form_textarea ga" placeholder="Type in General Appearance"></textarea>
			
			<div class="form_label with_action">
				<span>Neurological</span>
				<button class="btn blue pull-right pre_fill_btn" data-target="neu"><i class="fa fa-check-square-o"></i></button>
				<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
				<div class="clear"></div>
			</div>
			<textarea class="form_textarea neu" placeholder="Type in Neurological"></textarea>
			
			<div class="form_label with_action">
				<span>Cardiovascular</span>
				<button class="btn blue pull-right pre_fill_btn" data-target="car"><i class="fa fa-check-square-o"></i></button>
				<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
				<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
				<div class="clear"></div>
			</div>
			<textarea class="form_textarea car" placeholder="Type in Cardiovascular"></textarea>
			
			<div class="form_label with_action">
				<span>Abdomen</span>
				<button class="btn blue pull-right pre_fill_btn" data-target="abd"><i class="fa fa-check-square-o"></i></button>
				<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
				<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
				<div class="clear"></div>
			</div>
			<textarea class="form_textarea abd" placeholder="Type in Abdomen"></textarea>
			
			<div class="form_label with_action">
				<span>HEENT</span>
				<button class="btn blue pull-right pre_fill_btn" data-target="heent"><i class="fa fa-check-square-o"></i></button>
				<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
				<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
				<div class="clear"></div>
			</div>
			<textarea class="form_textarea heent" placeholder="Type in HEENT"></textarea>
			
			<div class="form_label with_action">
				<span>Genitourinary</span>
				<button class="btn blue pull-right pre_fill_btn" data-target="gen"><i class="fa fa-check-square-o"></i></button>
				<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
				<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
				<div class="clear"></div>
			</div>
			<textarea class="form_textarea gen" placeholder="Type in Genitourinary"></textarea>
			
			<div class="form_label with_action">
				<span>Neck</span>
				<button class="btn blue pull-right pre_fill_btn" data-target="neck"><i class="fa fa-check-square-o"></i></button>
				<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
				<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
				<div class="clear"></div>
			</div>
			<textarea class="form_textarea neck" placeholder="Type in Neck"></textarea>
			
			<div class="form_label with_action">
				<span>Extremities</span>
				<button class="btn blue pull-right pre_fill_btn" data-target="ext"><i class="fa fa-check-square-o"></i></button>
				<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
				<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
				<div class="clear"></div>
			</div>
			<textarea class="form_textarea ext" placeholder="Type in Extremities"></textarea>
			
			<div class="form_label with_action">
				<span>Chestwall</span>
				<button class="btn blue pull-right pre_fill_btn" data-target="che"><i class="fa fa-check-square-o"></i></button>
				<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
				<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
				<div class="clear"></div>
			</div>
			<textarea class="form_textarea che" placeholder="Type in Chestwall"></textarea>
			
			<div class="form_label with_action">
				<span>Rectal</span>
				<button class="btn blue pull-right pre_fill_btn" data-target="rec"><i class="fa fa-check-square-o"></i></button>
				<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
				<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
				<div class="clear"></div>
			</div>
			<textarea class="form_textarea rec" placeholder="Type in Rectal"></textarea>
			
			<div class="form_label with_action">
				<span>Lungs</span>
				<button class="btn blue pull-right pre_fill_btn" data-target="lungs"><i class="fa fa-check-square-o"></i></button>
				<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
				<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
				<div class="clear"></div>
			</div>
			<textarea class="form_textarea lungs" placeholder="Type in Lungs"></textarea>
			
			<div class="form_label with_action">
				<span>Skin</span>
				<button class="btn blue pull-right pre_fill_btn" data-target="skin"><i class="fa fa-check-square-o"></i></button>
				<button class="btn red pull-right"><i class="fa fa-plus"></i></button>
				<span class="pre_fill">awake; alert; well-developed; well-nourished; (-) acute distress</span>
				<div class="clear"></div>
			</div>
			<textarea class="form_textarea skin" placeholder="Type in Skin"></textarea>
			
		</div>
	</div>


	<div class="form_div diagnostic_results">
		<div class="inner-all">
			<h2 class="form_heading">
				Diagnostic Results
				<label for="upload_diagnostic" class="pull-right"><button class="btn blue">Upload</button></label>
			</h2>
			<input type="file" id="upload_diagnostic" />
			
			<div class="upload_container">
				<span>No uploaded images.</span>
			</div>
		</div>
	</div>
</div>



<!----------------
	Assessment
------------------>	
<div id="assessment" style="display:none">
	<div class="form_div assessment">
		<div class="inner-all">
			<span class="form_label">Diagnosis Library</span>
			<select class="form_select">
				<option></option>
			</select>
			
			<span class="form_label">ICD 10 Diagnosis</span>
			<div class="form_group">
				<input type="text" class="form_text left search_text" data-target="icd10_box">
				<span class="form_group_icon right"><i class="fa fa-search"></i></span>
			</div>
			
			<div class="icd10_box search_display_box"></div>
			
			<span class="form_label">Notes</span>
			<textarea class="form_textarea" placeholder="Type in Notes"></textarea>
			
			<button class="form_button btn blue">Save</button>
		</div>
	</div>
</div>



<!----------------
	Plan
------------------>
<div id="plan" style="display:none">
	<div class="form_div plan">
		<div class="inner-all">
			<div class="simple_tabs">
				<span class="active tab-open" data-tab-id="sub_management">Management</span>
				<span class="tab-open" data-tab-id="sub_prescription">Prescription</span>
				<span class="tab-open" data-tab-id="sub_diagnostic">Diagnostic</span>
				<span class="tab-open" data-tab-id="sub_appointment">Appointment</span>
				<span class="tab-open" data-tab-id="sub_medform">Medical Forms</span>
			</div>
			
			<!-- MANAGETMENT -->
			<div id="sub_management" class="active">
				<h2 class="form_heading">Procedures</h2>
				<div class="form_group">
					<input type="text" class="form_text left search_text" data-target="procedures_temp_box" placeholder="Search Clinical Procedure Template">
					<span class="form_group_icon right"><i class="fa fa-search"></i></span>
				</div>
				<div class="procedures_temp_box search_display_box"></div>
				
				<div class="form_group">
					<input type="text" class="form_text left search_text" data-target="procedures_box" placeholder="Search Procedure">
					<span class="form_group_icon right"><i class="fa fa-search"></i></span>
				</div>
				<div class="procedures_box search_display_box"></div>
				
				<span class="form_label">Procedures</span>
				<textarea class="form_textarea" placeholder="Type in Procedures"></textarea>
				
				<h2 class="form_heading">Management</h2>
				
				<div class="form_group">
					<input type="text" class="form_text left search_text" data-target="Management_temp_box" placeholder="Search Management Template">
					<span class="form_group_icon right"><i class="fa fa-search"></i></span>
				</div>
				<div class="Management_temp_box search_display_box"></div>
			
				<span class="form_label">Management</span>
				<textarea class="form_textarea" placeholder="Type in Management"></textarea>
				
				<br><br><br><br><br>
				
				<span class="form_label">Final Remarks</span>
				<textarea class="form_textarea" placeholder="Type in Final Remarks"></textarea>
				
				<button class="form_button btn blue">Save</button>
			</div>
			
			<!-- PRESCRIPTION -->
			<div id="sub_prescription" style="display:none">
				<h2 class="form_heading">Add Medicine</h2>
				
				<span class="form_label">Search</span>
				<div class="form_group">
					<input type="text" class="form_text left search_text" data-target="add_med_box" >
					<span class="form_group_icon right"><i class="fa fa-search"></i></span>
				</div>
				<div class="add_med_box search_display_box"></div>
				
				<span class="form_label">Quantity</span>
				<input type="text" class="form_text" >

				<span class="form_label">Sig</span>
				<div class="form_group">
					<div class="col-sm-4">
						<div class="innerR">
							<select class="form_select">
								<option></option>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<select class="form_select">
								<option>Daily</option>
								<option>Weekly</option>
								<option>Monthly</option>
								<option>Others</option>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="innerR">
							<select class="form_select">
								<option>For 1 day</option>
								<option>For 2 days</option>
								<option>For 3 days</option>
								<option>For 5 days</option>
								<option>For 7 days</option>
								<option>Others</option>
							</select>
						</div>
					</div>
				</div>
				
				<span class="form_label">Notes</span>
				<textarea class="form_textarea" placeholder="Type in Notes"></textarea>

				<button class="form_button btn blue">Save</button>
				
				<br><br><br><br>
				
				<h2 class="form_heading add_med_prod">
					<button class="btn blue pull-left"><i class="fa fa-plus"></i> Add Medicine</button>
					<button class="btn blue pull-left"><i class="fa fa-plus"></i> Add Product</button>
					<div class="clearfix"></div>
				</h2>
				<span class="empty_add_med">
					There are no prescriptions available.
				</span>
			</div>
			
			<!-- Diagnostic -->
			<div id="sub_diagnostic" style="display:none">
				<h2 class="form_heading">Add Medicine</h2>
				
				<span class="form_label">Procedures</span>
				<select class="form_select">
					<option>Chemistry</option>
				</select>
				
				<span class="form_label">Search</span>
				<div class="form_group">
					<input type="text" class="form_text left search_text" data-target="add_lab_test_box" >
					<span class="form_group_icon right"><i class="fa fa-search"></i></span>
				</div>
				<div class="add_lab_test_box search_display_box"></div>
				
				<button class="form_button btn blue">Save</button>
				
				<br><br><br>
				
				<button class="btn blue pull-left btn_spacer"><i class="fa fa-plus"></i> Add Laboratory Test</button>
				<button class="btn blue pull-left btn_spacer"><i class="fa fa-plus"></i> Add Radiology Test</button>
				<button class="btn blue pull-left btn_spacer"><i class="fa fa-plus"></i> Add Services</button>
				
				<table class="diagnostic_table simple_table">
					<thead>
						<tr>
							<td><input type="checkbox"></td>
							<td><span>Laboratory/Radiology Tests</span></td>
							<td><span>Category</span></td>
							<td><span>Availability</span></td>
							<td><span>Invoice Status</span></td>
							<td><span>Type</span></td>
							<td><span>Actions</span></td>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" valign="top">
							<td><input type="checkbox"></td>
							<td><span>GGT</span></td>
							<td><span>Live Function Test</span></td>
							<td><span>Not Available</span></td>
							<td><span>---</span></td>
							<td><span>Laboratory</span></td>
							<td class="action"><button class="btn red"><i class="fa fa-times"></i></button></td>
						</tr>
					</tbody>
				</table>
				
				<button class="btn white pull-left btn_spacer">Preview PDF</button>
				<button class="btn blue pull-left btn_spacer"><i class="fa fa-plus"></i> Add to Statement of Account</button>
				<button class="btn white pull-left btn_spacer">Diagnostic Referral</button>
				
				<div class="clearfix"></div>
				
			</div>
			
			<!-- Appointment -->
			<div id="sub_appointment" style="display:none">
				<h2 class="form_heading">Appointment</h2>
			
				<span class="form_label">Date</span>
				<input type="text" class="form_text datepicker" />
				
				<span class="form_label">Start Time</span>
				<div class="form_group">
					<div class="col-md-2 col-sm-2">
						<div class="innerR">
							<select class="form_select">
								<?php for($i=0; $i<12; $i++){ ?>
								<option><?php echo $i + 1 ?>:00</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-2 col-sm-2">
						<div class="innerR">
							<select class="form_select">
								<option>AM</option>
								<option>PM</option>
							</select>
						</div>
					</div>
				</div>

				<span class="form_label">Appointment Type</span>
				<select class="form_select">
					<option>Consultation</option>
				</select>
				
				<span class="form_label">Reason for Visit</span>
				<textarea class="form_textarea"></textarea>
				
				<span class="form_label">Provider</span>
				<select class="form_select">
					<option>Dr. Vilmer Morales</option>
				</select>
				
			</div>
	
			<!-- Medical Forms -->
			<div id="sub_medform" style="display:none">
				<span class="form_label">Select Form</span>
				<select class="form_select medform_temps">
					<option value="duac">Declaration Upon Admission/Consulatation</option>
					<option value="dad">Discharge Against Advice</option>
					<option value="ic">Informed Consent</option>
				</select>
				
				<br><br><br>
				
				<div class="medforms" >
					<!-- DUAC -->
					<div class="medform active" id="form_duac" style="display:none">
						<div class="inner-all20">
							<div class="medform_heading">
								<span class="fname">VILMER MORALES MD</span>
								<span class="type">GENERAL PRACTICE</span>
								<span class="clinic">Makati Medical Center</span>
								<span class="address">2 Amorsolo, Legaspi Village, Makati City</span>
								<span class="phone">Phone: 8888999</span>
								<span class="fax">Fax: 8888999</span>
								<span class="mobile">Mobile No: 0908868985</span>
							</div>
							
							<hr>
							
							<div class="medform_body">
								<div class="medform_select">
									<label><input type="radio" name="hosp_select"> Hospital</label>
									<label><input type="radio" name="hosp_select"> Clinic</label>
								</div>
							</div>
							
							<h3 class="title">DISCHARGE AGAINST ADVICE</h3>
							
							<p>I, <b class="pat_name">Gerard Andersson</b>, of legal age and with residence and postal address at, and presently confined at: </p>
							<p>Ward <input type="text">, </p>
							<p>Room <input type="text">, </p>
							<p>Bed No. <input type="text">, </p>
							<p>of this hospital express my desire to leave the hospital.</p>
							<br><br>
							<span class="form_label">Reason</span>
							<textarea class="form_textarea" placeholder="Type in Reason"></textarea>
							<br><br>
							<p>I was informed by member(s) of the medical staff (Consultants/Residents) of the risk to my/his/her life and health if I/he/she leave(s) the hospital.</p>
							<br>
							<p>Inspite of the advice no to leave the hospital and the potential risk to my/his/her/ life if I do so, I still insist that I/he/she be discharged from the hospital.</p>
							<br>
							<p>I will not hold the hospital or any member of its staff, administratively, criminally and/or civilly liable for whatever untoward consequence(s) of not acceding the advice</p>
							<div class="medform_sign">
								<span class="fname">GERARD ANDERSSON</span>
								<span class="sign_label">(Signature over printed name of the person giving free consent)</span>
							</div>
							<button class="btn blue pull-right">Generate PDF</button>
							
							<div class="clearfix"></div>
						</div>
					</div>
					
					<!-- DAD -->
					<div class="medform" id="form_dad" style="display:none">
						<div class="inner-all20">
							<div class="medform_heading">
								<span class="fname">VILMER MORALES MD</span>
								<span class="type">GENERAL PRACTICE</span>
								<span class="clinic">Makati Medical Center</span>
								<span class="address">2 Amorsolo, Legaspi Village, Makati City</span>
								<span class="phone">Phone: 8888999</span>
								<span class="fax">Fax: 8888999</span>
								<span class="mobile">Mobile No: 0908868985</span>
							</div>
							
							<hr>
							
							<div class="medform_body">
								<div class="medform_select">
									<label><input type="radio" name="adm_select"> Admission</label>
									<label><input type="radio" name="adm_select"> Consultation</label>
								</div>
							</div>
							
							<h3 class="title">DECLARATION UPON ADMISSION</h3>
							
							<p>I, <b class="pat_name">Gerard Andersson</b>, of legal age and with residence and postal address at, do hereby declare:</p>
							<br><br>
							<p>1. I am fully concious that all information gathered by the physician, nurses and other paramedical staff members regardless as to whether they are reflected in the clinical record or not are considered confidential or privileged, however, I allow disclosure of such to the representative of insurance or other social security agencies wherein I may be a potential beneficiary; my employer or his authorized representative and my personal physician;</p>
							<br>
							<p>2. To enhance sharing of knowledge and information among students and members of the medical staff, to ensure proper diagnosis and appropriate procedure of management, and to promote advance of medical science, I am waving my right of privacy on my physical self and for whatever information derived from it;</p>
							<br>
							<p>3. I allow the documentation and presentation of certain aspects of my ailment (picture-taking, video, etc) in the name of teaching, research, justice and other legitimate purposes;</p>
							<br>
							<p>4. Tissues, organs and part thereof which may be detached (remove) from my body or foreign bodies recovered must be possessed, preserved or disposed by proper authorities of the hospital;</p>
							<br>
							<p>5. I am allowed to have one (1) watcher and receive visitors at the place of my confinement provided that they comply with the existing rules and regulation prescribe by the hospital;</p>
							<br>
							<p>6. I refuse to be interviewed by the representative of the press or law enforcement agencies, except when the interest of justice demands otherwise and national security is involed, in which case, it must be prior approval of the attending physician and the head of the hospital;</p>
							<br>
							<p>7. <textarea style="vertical-align:top;"></textarea></p>
							<br><br>
							<p>IN WITNESS WHEREOF, I hereunto affix my signature <b>August 08, 2014</b>.</p>
							
							<div class="medform_sign">
								<span class="fname">GERARD ANDERSSON</span>
								<span class="sign_label">(Signature over printed name of the person giving free consent)</span>
							</div>
							
							<button class="btn blue pull-right">Generate PDF</button>
							
							<div class="clearfix"></div>
						</div>
					</div>
					
					<!-- IC -->
					<div class="medform" id="form_ic" >
						<div class="inner-all20">
							<div class="medform_heading">
								<span class="fname">VILMER MORALES MD</span>
								<span class="type">GENERAL PRACTICE</span>
								<span class="clinic">Makati Medical Center</span>
								<span class="address">2 Amorsolo, Legaspi Village, Makati City</span>
								<span class="phone">Phone: 8888999</span>
								<span class="fax">Fax: 8888999</span>
								<span class="mobile">Mobile No: 0908868985</span>
							</div>
							
							<hr>
							
							<h3 class="title">INFORM CONSENT FOR SURGERY, <br>ANESTHESIA, OR OTHER PROCEDURES</h3>
							
							<p>TO WHOM IT MAY CONCERN:</p>
							<br><br>
							<p>I, <b class="pat_name">Gerard Andersson</b>, of legal age and with residence and postal address at, hereby consent to the performance of <input type="text"> on me by Dr. <input type="text" value="Vilmer Morales"/></p>
							<br><br>
							<p>This consent was given after the above have been fully explained in simple, adequate and understandable language to me by the doctors concerned including the risks involved and/or their alternative procedures including the risks involved or potential consequence.</p>
							<br>
							<p>I hereby consent to the performance of the operations in addition to or different from the one I have given consent to and application of other alternative procedures which may be considered necessary and advisable in accordance with the wise dictates of surgery.</p>
							<br>
							<p>I further consent to the administration of anesthesia which may be considered deemed proper for whatever procedures that may be done on me.</p>
							<br>
							<p>IN WITNESS WHEREOF, I hereunto affix my signature this <b>August 05, 2014</b></p>
							<div class="medform_sign">
								<span class="fname">GERARD ANDERSSON</span>
								<span class="sign_label">(Signature over printed name of the person giving free consent)</span>
							</div>
							<button class="btn blue pull-right">Generate PDF</button>
							
							<div class="clearfix"></div>
						</div>
					</div>
					
					
				</div>
				
			</div>
			
		</div>
	</div>
</div>



<!-- Vital Clone -->
<div class="clone_vital" style="display:none">
	<div class="vitals">
		<div class="inner-all">
			<div class="form_group">
				<div class="col-sm-6">
					<div class="innerR">
						<span class="form_label">Date | Time</span>
						<input type="text" class="form_text" />
					</div>
				</div>
				<div class="col-sm-6">
					<div class="innerR">
						<span class="form_label">Mental Status</span>
						<select class="form_select">
							<option>Select</option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="form_group">
				<div class="col-sm-6">
					<div class="innerR">
						<span class="form_label">BP</span>
						<input type="text" class="form_text half" />
						<span class="bp_over">/</span>
						<input type="text" class="form_text half" />
					</div>
				</div>
				<div class="col-sm-6">
					<div class="innerR">
						<span class="form_label">PR</span>
						<input type="text" class="form_text" />
					</div>
				</div>
			</div>
			
			<div class="form_group">
				<div class="col-sm-4">
					<div class="innerR">
						<span class="form_label">Temp</span>
						<input type="text" class="form_text" />
					</div>
				</div>
				<div class="col-sm-4">
					<div class="innerR">
						<span class="form_label">RR</span>
						<input type="text" class="form_text" />
					</div>
				</div>
				<div class="col-sm-4">
					<div class="innerR">
						<span class="form_label">Pain Scale </span>
						<div class="form_group">
							<input type="text" class="form_text left pain_scale_text" />
							<span class="form_group_icon right"><i class="fa fa-edit pain_scale lightbox-mode" data-target="pain_scale_lb"></i></span>
							
						</div>
					</div>
				</div>
			</div>
			
			<span class="form_label">Notes</span>
			<textarea class="form_textarea" placeholder="Type in Notes"></textarea>
			
			<span class="form_label">Taken by</span>
			<input type="text" class="form_text" />
		</div>
	</div>
</div>


<!-- Pain Scale Lightbox -->
<div class="lightbox pain_scale_lb" style="display:none">
	<div class="heading">
		<span class="close">x</span>
		<h2 class="margin-none">Pain Scale</h2>
	</div>
	<div class="pain_scale_box">
		<img src="<?php echo base_url()."assets2/_theme/img/pain_scale.png" ?>" class="pain_scale_img" />
		<div class="inner-all">
			<input type="text" class="form_text right" />
			<button class="form_button btn blue set_pain_scale">Set Pain Scale</button>
		</div>
	</div>
</div>
	
	
<!-- Clone - Search add -->
<div class="clone_search" style="display:none">
	<div class="sd_box">
		<div class="search_display">
			<i class="fa fa-times pull-right"></i>
			<button class="add_note_btn pull-right"><i class="fa fa-plus"></i> Add Notes</button>
			<span></span>
		</div>
		<div class="note_box">
			<textarea placeholder="Type in Notes"></textarea>
		</div>
	</div>
</div>