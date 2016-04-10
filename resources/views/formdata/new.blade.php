@extends('template')

@section('css')
@endsection

@section('content')

	<div class="row">
	<form id="form" class="form-horizontal" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="col-sm-12">
			<div class="panel panel-white">
				<div class="panel-heading">
					<h4 class="panel-title"><strong>Personal</strong>&nbsp;Details</h4>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							Name
						</label>
						<div class="col-sm-3">
							<input type="text" placeholder="First" name="first_name" class="form-control" required>
						</div>
						<div class="col-sm-3">
							<input type="text" placeholder="Middle" name="middle_name" class="form-control">
						</div>
						<div class="col-sm-3">
							<input type="text" placeholder="Last" name="last_name" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							Gender
						</label>
						<label class="radio-inline">
					      <input type="radio" name="gender" value="Male">Male
					    </label>
					    <label class="radio-inline">
					      <input type="radio" name="gender" checked="" value="Female">Female
					    </label>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							Nationality
						</label>
						<div class="col-sm-3">
							<input type="text" placeholder="" name="nationality" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							Date of birth
						</label>
						<div class="col-sm-3">
							<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" name="dob" class="form-control date-picker" required>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="panel panel-white">
				<div class="panel-heading">
					<h4 class="panel-title"><strong>Contact</strong>&nbsp;Details</h4>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							Land phone
						</label>
						<div class="col-sm-3">
							<input type="text" placeholder="" name="phone" class="input-mask-phone form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							Mobile phone
						</label>
						<div class="col-sm-3">
							<input type="text" placeholder="" name="mobile" class="input-mask-mobile form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							Email
						</label>
						<div class="col-sm-6">
							<input type="email" placeholder="" name="email" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							Address
						</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" name="address" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							Prefered mode of contact
						</label>
						<div class="col-sm-3">
							<select name="preferred_mode_of_contact" class="form-control">
								<option value="Email">Email</option>
								<option value="Phone">Phone</option>
								<option value="None">None</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="panel panel-white">
				<div class="panel-heading">
					<h4 class="panel-title"><strong>Educational</strong>&nbsp;Background</h4>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							Highest qualification achieved
						</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" name="qualification" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							University
						</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" name="university" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">
							High School
						</label>
						<div class="col-sm-6">
							<input type="text" placeholder="" name="high_school" class="form-control">
						</div>
					</div>
					<div class="form-group pull-right">
						<button type="submit" id="submit_button" class="form-control btn btn-success">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	</div>
@endsection

@section('toolbar')
	<ul class="nav navbar-top-links navbar-right" style="float:right">
        <li class="dropdown">
            <a onclick="$('#submit_button').click()" style="cursor:pointer">
                <i class="fa fa-save fa-2x"></i>
            </a>
         </li>
    </ul>
@endsection

@section('javascript')
@endsection