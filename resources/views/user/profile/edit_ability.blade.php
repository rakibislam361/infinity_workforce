 <div class="modal fade" id="ability" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Update Working Ability</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('user-able-to-work',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                                <div class="row mt-2 px-3">
                                    <label for="work_per_week" class="control-label mb-1 mr-2">How many hours per week are you able to work ?</label>
							<input id="work_per_week" type="number" name="work_per_week" class="form-control col-md-5" placeholder="15" value="{{@$user->info->work_per_week}}">
							<span class="text-danger"> {{ $errors->first('work_per_week') }}</span>

							<div class="clearfix mt-3"></div>
							<strong>What days and/or time are you able to work?</strong>
							<table class="mt-3 table table-responsive table-bordered">
									<thead>
										<tr>
											<!-- <th>Day</th> -->
											<th>Sun</th>
											<th>Mon</th>
											<th>Tue</th>
											<th>Wed</th>
											<th>Thu</th>
											<th>Fri</th>
											<th>Sat</th>
										</tr>
										<tbody>
											<tr>
												<!-- <th>Time</th> -->
												<td>
													<div>
														<?php
														function sun_start_times( $default = '10:00', $interval = '+60 minutes' ) {
														    $output = '';
														    $current = strtotime( '00:00' );
														    $end = strtotime( '23:59' );
														    while( $current <= $end ) {
														        $time = date( 'H:i', $current );
														        $sel = ( $time == $default ) ? ' selected' : '';

														        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
														        $current = strtotime( $interval, $current );
														    }
														    return $output;
														}
														?>
														<select name="sun_start"><?php echo sun_start_times(); ?></select>
													</div>
													<div class="text-center">
													<span>to</span>
													</div>
													<div>
														<?php
														function sun_end_times( $default = '17:00', $interval = '+60 minutes' ) {
														    $output = '';
														    $current = strtotime( '00:00' );
														    $end = strtotime( '23:59' );
														    while( $current <= $end ) {
														        $time = date( 'H:i', $current );
														        $sel = ( $time == $default ) ? ' selected' : '';

														        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
														        $current = strtotime( $interval, $current );
														    }
														    return $output;
														}
														?>
														<select name="sun_end"><?php echo sun_end_times(); ?></select>
													</div>
													{{--<input id="sun" type="text" name="sun" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->sun}}">
													<span class="text-danger"> {{ $errors->first('sun') }}</span>--}}
												</td>
												<td>
													<div>
														<?php
														function mon_start_times( $default = '10:00', $interval = '+60 minutes' ) {
														    $output = '';
														    $current = strtotime( '00:00' );
														    $end = strtotime( '23:59' );
														    while( $current <= $end ) {
														        $time = date( 'H:i', $current );
														        $sel = ( $time == $default ) ? ' selected' : '';

														        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
														        $current = strtotime( $interval, $current );
														    }
														    return $output;
														}
														?>
														<select name="mon_start"><?php echo mon_start_times(); ?></select>
													</div>
													<div class="text-center">
													<span>to</span>
													</div>
													<div>
														<?php
														function mon_end_times( $default = '17:00', $interval = '+60 minutes' ) {
														    $output = '';
														    $current = strtotime( '00:00' );
														    $end = strtotime( '23:59' );
														    while( $current <= $end ) {
														        $time = date( 'H:i', $current );
														        $sel = ( $time == $default ) ? ' selected' : '';

														        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
														        $current = strtotime( $interval, $current );
														    }
														    return $output;
														}
														?>
														<select name="mon_end"><?php echo mon_end_times(); ?></select>
													</div>
													{{--<input id="mon" type="text" name="mon" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->mon}}">
													<span class="text-danger"> {{ $errors->first('mon') }}</span>--}}
												</td>
												<td>
													<div>
														<?php
														function tue_start_times( $default = '10:00', $interval = '+60 minutes' ) {
														    $output = '';
														    $current = strtotime( '00:00' );
														    $end = strtotime( '23:59' );
														    while( $current <= $end ) {
														        $time = date( 'H:i', $current );
														        $sel = ( $time == $default ) ? ' selected' : '';

														        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
														        $current = strtotime( $interval, $current );
														    }
														    return $output;
														}
														?>
														<select name="tue_start"><?php echo tue_start_times(); ?></select>
													</div>
													<div class="text-center">
													<span>to</span>
													</div>
													<div>
														<?php
														function tue_end_times( $default = '17:00', $interval = '+60 minutes' ) {
														    $output = '';
														    $current = strtotime( '00:00' );
														    $end = strtotime( '23:59' );
														    while( $current <= $end ) {
														        $time = date( 'H:i', $current );
														        $sel = ( $time == $default ) ? ' selected' : '';

														        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
														        $current = strtotime( $interval, $current );
														    }
														    return $output;
														}
														?>
														<select name="tue_end"><?php echo tue_end_times(); ?></select>
													</div>
													{{--<input type="text" name="tue" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->tue}}">
													<span class="text-danger"> {{ $errors->first('tue') }}</span>--}}
												</td>
												<td>
													<div>
														<?php
														function wed_start_times( $default = '10:00', $interval = '+60 minutes' ) {
														    $output = '';
														    $current = strtotime( '00:00' );
														    $end = strtotime( '23:59' );
														    while( $current <= $end ) {
														        $time = date( 'H:i', $current );
														        $sel = ( $time == $default ) ? ' selected' : '';

														        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
														        $current = strtotime( $interval, $current );
														    }
														    return $output;
														}
														?>
														<select name="wed_start"><?php echo wed_start_times(); ?></select>
													</div>
													<div class="text-center">
													<span>to</span>
													</div>
													<div>
														<?php
														function wed_end_times( $default = '17:00', $interval = '+60 minutes' ) {
														    $output = '';
														    $current = strtotime( '00:00' );
														    $end = strtotime( '23:59' );
														    while( $current <= $end ) {
														        $time = date( 'H:i', $current );
														        $sel = ( $time == $default ) ? ' selected' : '';

														        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
														        $current = strtotime( $interval, $current );
														    }
														    return $output;
														}
														?>
														<select name="wed_end"><?php echo wed_end_times(); ?></select>
													</div>
													{{--<input  type="text" name="wed" class="form-control" placeholder="10am-5pm"  value="{{@$user->able_to_work->wed}}">
													<span class="text-danger"> {{ $errors->first('wed') }}</span>--}}
												</td>
												<td>
													<div>
														<?php
														function thu_start_times( $default = '10:00', $interval = '+60 minutes' ) {
														    $output = '';
														    $current = strtotime( '00:00' );
														    $end = strtotime( '23:59' );
														    while( $current <= $end ) {
														        $time = date( 'H:i', $current );
														        $sel = ( $time == $default ) ? ' selected' : '';

														        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
														        $current = strtotime( $interval, $current );
														    }
														    return $output;
														}
														?>
														<select name="thu_start"><?php echo thu_start_times(); ?></select>
													</div>
													<div class="text-center">
													<span>to</span>
													</div>
													<div>
														<?php
														function thu_end_times( $default = '17:00', $interval = '+60 minutes' ) {
														    $output = '';
														    $current = strtotime( '00:00' );
														    $end = strtotime( '23:59' );
														    while( $current <= $end ) {
														        $time = date( 'H:i', $current );
														        $sel = ( $time == $default ) ? ' selected' : '';

														        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
														        $current = strtotime( $interval, $current );
														    }
														    return $output;
														}
														?>
														<select name="thu_end"><?php echo thu_end_times(); ?></select>
													</div>
													{{--<input  type="text" name="thu" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->thu}}">
													<span class="text-danger"> {{ $errors->first('thu') }}</span>--}}
												</td>
												<td>
													<div>
														<?php
														function fri_start_times( $default = '10:00', $interval = '+60 minutes' ) {
														    $output = '';
														    $current = strtotime( '00:00' );
														    $end = strtotime( '23:59' );
														    while( $current <= $end ) {
														        $time = date( 'H:i', $current );
														        $sel = ( $time == $default ) ? ' selected' : '';

														        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
														        $current = strtotime( $interval, $current );
														    }
														    return $output;
														}
														?>
														<select name="fri_start"><?php echo fri_start_times(); ?></select>
													</div>
													<div class="text-center">
													<span>to</span>
													</div>
													<div>
														<?php
														function fri_end_times( $default = '17:00', $interval = '+60 minutes' ) {
														    $output = '';
														    $current = strtotime( '00:00' );
														    $end = strtotime( '23:59' );
														    while( $current <= $end ) {
														        $time = date( 'H:i', $current );
														        $sel = ( $time == $default ) ? ' selected' : '';

														        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
														        $current = strtotime( $interval, $current );
														    }
														    return $output;
														}
														?>
														<select name="fri_end"><?php echo fri_end_times(); ?></select>
													</div>
													{{--<input  type="text" name="fri" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->fri}}">
													<span class="text-danger"> {{ $errors->first('fri') }}</span>--}}
												</td>
												<td>
													<div>
														<?php
														function sat_start_times( $default = '10:00', $interval = '+60 minutes' ) {
														    $output = '';
														    $current = strtotime( '00:00' );
														    $end = strtotime( '23:59' );
														    while( $current <= $end ) {
														        $time = date( 'H:i', $current );
														        $sel = ( $time == $default ) ? ' selected' : '';

														        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
														        $current = strtotime( $interval, $current );
														    }
														    return $output;
														}
														?>
														<select name="sat_start"><?php echo sat_start_times(); ?></select>
													</div>
													<div class="text-center">
													<span>to</span>
													</div>
													<div>
														<?php
														function sat_end_times( $default = '17:00', $interval = '+60 minutes' ) {
														    $output = '';
														    $current = strtotime( '00:00' );
														    $end = strtotime( '23:59' );
														    while( $current <= $end ) {
														        $time = date( 'H:i', $current );
														        $sel = ( $time == $default ) ? ' selected' : '';

														        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
														        $current = strtotime( $interval, $current );
														    }
														    return $output;
														}
														?>
														<select name="sat_end"><?php echo sat_end_times(); ?></select>
													</div>
													{{--<input  type="text" name="sat" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->sat}}">
													<span class="text-danger"> {{ $errors->first('sat') }}</span>--}}
												</td>
												

											</tr>

										</tbody>
									</thead>								
							</table>
                                    
                                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>