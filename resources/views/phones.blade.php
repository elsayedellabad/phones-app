<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel Pagination Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    
    <div class="container mt-5">
        <!-- @if(isset($errors))
            @foreach ($errors->all('<p style="color:red">:message</p>') as $error)
                {{$error}}
            @endforeach
        @endif -->
        <h1 style ="margin-bottom: 50px">Phone numbers [{{ count($customers); }}]</h1>

        <form class="form-inline">
            <div class="form-group mb-4">
                <label for="exampleFormControlSelect1"></label>
                <select class="form-control form-select-lg mb-3" id="country"  onchange="getUpdatedPhones()" style ="width: 250px">
                    <option {{($country_code =='all')? 'selected' : ''}} value="all" > Select Country</option>
                    @foreach($countries  as $code => $country)
                        <option  {{($country_code == $code)? 'selected' : ''}} value="{{ $code }}" >{{ $country }} </option>
                    @endforeach                    
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="exampleFormControlSelect2"></label>
                <select class="form-control form-select-lg mb-3" id="state" onchange="getUpdatedPhones()" style ="width: 250px; margin-left: 30px;">
                    <option {{($state =='all')? 'selected' : ''}} value="all">All</option>
                    <option  {{($state == 'valid')? 'selected' : ''}} value="valid">Valid Phone Numbers</option>
                    <option  {{($state == 'invalid')? 'selected' : ''}} value="invalid">Invalid Phone Numbers</option>
                </select>
            </div>
            
        </form>
            
        @if(isset($customers) && count($customers) > 0)
            <table class="table table-bordered table-striped mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">Country</th>
                        <th scope="col">State</th>
                        <th scope="col">Country Code</th>
                        <th scope="col">Phone Num</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $data)
                    <tr>
                        <th scope="row">{{ $data['country'] }}</th>
                        <td>{{ $data['state'] }}</td>
                        <td>{{ $data['country_code'] }}</td>
                        <td>{{ $data['phone_num'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                
            </div>
        @endif

        @if(isset($customers) && count($customers) == 0)
            <h5> There are no results for your selected filters, Please select another one. </h1>
        @endif
    </div>
</body>


<script type="text/javascript"> 
    
   
    function getUpdatedPhones(){
        //alert(document.getElementById('country').value + document.getElementById('state').value);        
        var country_code =   document.getElementById('country').value;
        var state   =   document.getElementById('state').value;

        base = "<?php echo URL::to('/'); ?>";
        window.location = base + '/' + country_code + '/' + state;

        //base = "<?php echo URL::to('api/customers'); ?>";
        // var xmlHttp = null;    
        // xmlHttp = new XMLHttpRequest();
        // xmlHttp.open( "GET", base + '/' + country_code + '/' + state, false );
        // xmlHttp.send( null );
        
        
    }
</script>



</html>