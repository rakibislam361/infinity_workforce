
@extends('layouts.master')
 @push('title')
        User Work History
    @endpush
@push('head')

@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="mt-3 mb-3">
                        @if($user->able_to_work)
                        <dl class="row mb-3">
                            <dt class="col-sm-4"> You able to work </dt>
                        </dl>
                        <table class="table table-bordered" id="ability_table">
                            <thead>
                                <th>Day</th>
                                <th>Sunday</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thirsday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Time</th>
                                    <td>{{@$user->able_to_work->sun_start}}-{{@$user->able_to_work->sun_end}}</td>
                                    <td>{{@$user->able_to_work->mon_start}}-{{@$user->able_to_work->mon_end}}</td>
                                    <td>{{@$user->able_to_work->tue_start}}-{{@$user->able_to_work->tue_end}}</td>
                                    <td>{{@$user->able_to_work->wed_start}}-{{@$user->able_to_work->wed_end}}</td>
                                    <td>{{@$user->able_to_work->thu_start}}-{{@$user->able_to_work->tue_end}}</td>
                                    <td>{{@$user->able_to_work->fri_start}}-{{@$user->able_to_work->fri_end}}</td>
                                    <td>{{@$user->able_to_work->sat_start}}-{{@$user->able_to_work->sat_end}}</td>
                                </tr>
                            </tbody>
                        </table>
                        @else
                            <p class="text-warning"><i class="fa fa-warning"></i> No Availability Information</p>
                        @endif
                    </div>
                 <form action="{{url('user/able-to-work')}}/{{$user->id}}" method="post">
                @csrf
           
                            <div class="row mt-2 px-3">
                                    

                            <div class="clearfix mt-3"></div>
                            <strong>What days and/or time are you able to work?</strong>
                            <table class="mt-3 table table-bordered table-responsive"   >
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
                                                        function sun_start_times( $default = '0', $interval = '+60 minutes' ) {
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
                                                        <select name="sun_start">
                                                            <option value="0">Not available</option>
                                                            <?php echo sun_start_times(); ?></select>
                                                    </div>
                                                    <div class="text-center">
                                                    <span>to</span>
                                                    </div>
                                                    <div>
                                                        <?php
                                                        function sun_end_times( $default = '0', $interval = '+60 minutes' ) {
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
                                                        <select name="sun_end">
                                                            <option value="0">Not available</option>
                                                            <?php echo sun_end_times(); ?>
                                                                
                                                            </select>
                                                    </div>
                                                    {{--<input id="sun" type="text" name="sun" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->sun}}">
                                                    <span class="text-danger"> {{ $errors->first('sun') }}</span>--}}
                                                </td>
                                                <td>
                                                    <div>
                                                        <?php
                                                        function mon_start_times( $default = '0', $interval = '+60 minutes' ) {
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
                                                        <select name="mon_start">
                                                            <option value="0">Not available</option>
                                                            <?php echo mon_start_times(); ?>
                                                                
                                                            </select>
                                                    </div>
                                                    <div class="text-center">
                                                    <span>to</span>
                                                    </div>
                                                    <div>
                                                        <?php
                                                        function mon_end_times( $default = '0', $interval = '+60 minutes' ) {
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
                                                        <select name="mon_end">
                                                            <option value="0">Not available</option>
                                                            <?php echo mon_end_times(); ?></select>
                                                    </div>
                                                    {{--<input id="mon" type="text" name="mon" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->mon}}">
                                                    <span class="text-danger"> {{ $errors->first('mon') }}</span>--}}
                                                </td>
                                                <td>
                                                    <div>
                                                        <?php
                                                        function tue_start_times( $default = '0', $interval = '+60 minutes' ) {
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
                                                        <select name="tue_start">
                                                            <option value="0">Not available</option>
                                                            <?php echo tue_start_times(); ?></select>
                                                    </div>
                                                    <div class="text-center">
                                                    <span>to</span>
                                                    </div>
                                                    <div>
                                                        <?php
                                                        function tue_end_times( $default = '0', $interval = '+60 minutes' ) {
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
                                                        <select name="tue_end">
                                                            <option value="0">Not available</option>
                                                            <?php echo tue_end_times(); ?></select>
                                                    </div>
                                                    {{--<input type="text" name="tue" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->tue}}">
                                                    <span class="text-danger"> {{ $errors->first('tue') }}</span>--}}
                                                </td>
                                                <td>
                                                    <div>
                                                        <?php
                                                        function wed_start_times( $default = '0', $interval = '+60 minutes' ) {
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
                                                        <select name="wed_start">
                                                            <option value="0">Not available</option>
                                                            <?php echo wed_start_times(); ?>
                                                                
                                                            </select>
                                                    </div>
                                                    <div class="text-center">
                                                    <span>to</span>
                                                    </div>
                                                    <div>
                                                        <?php
                                                        function wed_end_times( $default = '0', $interval = '+60 minutes' ) {
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
                                                        <select name="wed_end">
                                                            <option value="0">Not available</option>
                                                            <?php echo wed_end_times(); ?></select>
                                                    </div>
                                                    {{--<input  type="text" name="wed" class="form-control" placeholder="10am-5pm"  value="{{@$user->able_to_work->wed}}">
                                                    <span class="text-danger"> {{ $errors->first('wed') }}</span>--}}
                                                </td>
                                                <td>
                                                    <div>
                                                        <?php
                                                        function thu_start_times( $default = '0', $interval = '+60 minutes' ) {
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
                                                        <select name="thu_start">
                                                            <option value="0">Not available</option>
                                                            <?php echo thu_start_times(); ?></select>
                                                    </div>
                                                    <div class="text-center">
                                                    <span>to</span>
                                                    </div>
                                                    <div>
                                                        <?php
                                                        function thu_end_times( $default = '0', $interval = '+60 minutes' ) {
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
                                                        <select name="thu_end"><option value="0">Not available</option><?php echo thu_end_times(); ?></select>
                                                    </div>
                                                    {{--<input  type="text" name="thu" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->thu}}">
                                                    <span class="text-danger"> {{ $errors->first('thu') }}</span>--}}
                                                </td>
                                                <td>
                                                    <div>
                                                        <?php
                                                        function fri_start_times( $default = '0', $interval = '+60 minutes' ) {
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
                                                        <select name="fri_start"><option value="0">Select</option><?php echo fri_start_times(); ?></select>
                                                    </div>
                                                    <div class="text-center">
                                                    <span>to</span>
                                                    </div>
                                                    <div>
                                                        <?php
                                                        function fri_end_times( $default = '0', $interval = '+60 minutes' ) {
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
                                                        <select name="fri_end"><option value="0">Select</option><?php echo fri_end_times(); ?></select>
                                                    </div>
                                                    {{--<input  type="text" name="fri" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->fri}}">
                                                    <span class="text-danger"> {{ $errors->first('fri') }}</span>--}}
                                                </td>
                                                <td>
                                                    <div>
                                                        <?php
                                                        function sat_start_times( $default = '0', $interval = '+60 minutes' ) {
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
                                                        <select name="sat_start">
                                                            <option value="0">Select</option>
                                                            <?php echo sat_start_times(); ?></select>
                                                    </div>
                                                    <div class="text-center">
                                                    <span>to</span>
                                                    </div>
                                                    <div>
                                                        <?php
                                                        function sat_end_times( $default = '0', $interval = '+60 minutes' ) {
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
                                                        <select name="sat_end"><option value="0">Select</option><?php echo sat_end_times(); ?></select>
                                                    </div>
                                                    {{--<input  type="text" name="sat" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->sat}}">
                                                    <span class="text-danger"> {{ $errors->first('sat') }}</span>--}}
                                                </td>
                                                

                                            </tr>

                                        </tbody>
                                    </thead>                                
                            </table>
                                    
                                </div>
            
            <div class="modal-footer">
                <button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i>Reset</button>
                <button type="submit" class="btn btn-primary"><i class="ti-save-alt mr-1"></i> Update</button>
                <a href="{{route('user-wish-to-work')}}" class="btn btn-info">Next <i class="ti-shift-right"></i></a>
            </div>
            </form>

              
                
    
            </div>
        </div>
    </div>
</div>
@endsection
@push('footer')

<script src="{{ asset('/admin/assets')}}/js/datepicker/picker.js"></script>
<script src="{{ asset('/admin/assets')}}/js/datepicker/picker.date.js"></script>
<script type="text/javascript">
    jQuery(function ($){
     $('.start_date').pickadate({
        selectYears: 30,
        yearRange: '-30:+0',
        format: 'yyyy-mm-dd',
        //formatSubmit: 'y-mm-dd'
    });
     $('.end_date').pickadate({
        selectYears: 30,
        format: 'yyyy-mm-dd',
        //formatSubmit: 'y-mm-dd'
    });
     });
</script>


@endpush