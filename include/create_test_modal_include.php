<!--Create Test Modal-->
<div id="CreateTest" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title display-4" style="font-size:30px;">Create Test</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <div class="modal-body flex-column">
                <form method="POST" class="m-2" action="../staff/create_test_script.php">
                    <br>
                    <div class="form-group">
                        <label>Enter Test Name</label>
                        <input class="form-control" type="text" name="test_name" placeholder="Test Name">
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>Select Test Stream</label>
                                <select id="inputStream" class="form-control" name="test_stream">
                                    <option selected>Choose Stream...</option>
                                    <option>MBA-CET</option>
                                    <option>MCA</option>
                                    <option>MCA-CET</option>
                                    <option>NIMCET</option>
                                    <option>CAT</option>
                                </select>
                            </div>
                            <div class="col">
                                <label>Enter Test Subject</label>
                                <input type="text" class="form-control" name="test_subject" placeholder="Test Subject">
                            </div>
                            <div class="col">
                                <label>Number of Test Questions</label>
                                <input type="number" min="1" max="30" class="form-control" name="number_of_questions" placeholder="eg. 10,15,20">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label style="display: block">Negative Marking</label>
                                <label class="custom-control custom-checkbox">
                                    <input id="customCheck1" type="checkbox" class="custom-control-input" name="negative_mark">
                                    <label class="custom-control-label" for="customCheck1">Enable Negative Marking</label>
                                </label>
                            </div>
                            <div class="col-md-4" id="neg-marking">
                                <label>Wrong Answer</label>
                                <input type="text" class="form-control" name="on_wrong" placeholder="Marks 0-5">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label style="display: block">Test Time</label>
                                <label class="custom-control custom-checkbox">
                                    <input id="customCheck2" type="checkbox" class="custom-control-input" name="test_time">
                                    <label class="custom-control-label" for="customCheck2">Enable Test Time</label>
                                </label>
                            </div>
                            <div class="col-md-4" id="test-time">
                                <label>Time Limit</label>
                                <input type="number" class="form-control" name="test_time_minutes" placeholder="Time in Minutes">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label style="display: block;">Test Visibility</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="customRadioInline1" name="customRadioInline1" type="radio" class="custom-control-input" value="public" required>
                                    <label class="custom-control-label" for="customRadioInline1">Public</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="customRadioInline2" name="customRadioInline1" type="radio" class="custom-control-input" value="private" required>
                                    <label class="custom-control-label" for="customRadioInline2">Private</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button class="btn btn-dark" type="submit">Create Test</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
