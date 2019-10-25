@extends('layouts.step')

 @section('styles')
  <style>
  
      /*navbar css*/
     #containere {
                display: grid;
                grid-template-columns: 1fr 8fr 2fr;
            }
            /*changed this*/
            #containere div {
                box-shadow: 0px 4px 2px rgba(0, 0, 0, 0.1);
                outline: none;
                height: 60px;
            }
            #containere p {
                justify-content: center;
                margin-top: 15px;
                font-style: normal;
                font-weight: bold;
                font-size: 1.3em;
                color: #323A43;
            }
            div>#ext {
                background: rgba(207, 204, 204, 0.4);
                font-size: 24px;
                font-weight: bold;
                justify-content: center;
                border: none;
                color: white;
                width: 100%;
                height: 60px;
                outline: none;
                /*added outline none*/
            }
            
            /*changed this from clear to close*/
            div>.close {
                outline: none;
                padding-top: 15px;
            }
            .close {
                color: #C4C4C4;
                width: 100%;
            }
    /*end of nav bar*/

    /* main section */

    .main-section {
      margin: 50px auto;
      width: 50%;
    }

    .section1 {
      border: 1px solid #919191;
      box-sizing: border-box;
    }

    .section1 div {
      padding: 5px 20px;
    }

    #word h1 {
      font-family: Ubuntu;
      font-style: normal;
      font-weight: bold;
      font-size: 32px;
      line-height: 48px;
      color: #262626;
    }

    #word h5 {
      font-family: Ubuntu;
      font-style: normal;
      font-weight: normal;
      font-size: 18px;
      line-height: 21px;
      color: #262626;
    }

    #glac h1 {
      font-family: Ubuntu;
      font-style: normal;
      font-weight: normal;
      font-size: 1.8rem;
      line-height: 41px;
      color: #262626;
      padding-top: 30px;
      margin-left: 50px;
    }

    div h3 {
      font-family: Ubuntu;
      font-style: bold;
      font-weight: bold;
      font-size: 1.4rem;
      line-height: 41px;
      color: #262626;
    }

    .bill p {
      font-size: 1em;
      padding-top: 10px;
      color: #262626;
    }

    .hour {
      display: grid;
      grid-template-columns: 1fr 1fr;
    }

    .hours {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
    }

    input {
      height: 30px;
      width: 50%;
      text-align: center;
      border: 1px solid;
    }

    .start {
      margin-left: 100px;
      width: 100%;
    }

    .end {
      margin-left: 50px;
      width: 100%;
    }

    i input {
      border: none;
      border-bottom: 1px solid;
      text-decoration: underline;
    }

    .sub {
      width: 90%;
    }

    #currency {
      font-family: Ubuntu;
      font-style: normal;
      font-weight: normal;
      font-size: 20px;
      line-height: 28px;
      color: #262626;
      padding-bottom: 20px;
    }

    select {
      border: none;
      border-bottom: 1px solid;
    }

    .btn {
      border: 1px solid #e4e4e4;
      background: #e4e4e4;
      margin-top: 40px;
      margin-left: 30%;
      width: 40%;
      height: 60px;
      color: white;
    }

    @media screen and (max-width: 1400px) {
      .start {
        margin-left: 80px;
        width: 100%;
      }
      .end {
        margin-left: 30px;
        width: 100%;
      }
    }

    @media screen and (max-width: 1102px) {
      .hours {
        display: grid;
        grid-template-columns: 0.5fr 1fr 1fr;
      }
    }

    @media (max-width: 948px) {
      .hour, .hours {
        display: block;
      }
      .start {
        margin-left: 0px;
        width: 100%;
      }
      .end {
        margin-left: 0px;
        width: 100%;
      }
    }


        @media (max-width: 700px){
      #glac h1 {
        /* font-family: Ubuntu; */
        /* font-style: normal; */
        /* font-weight: normal; */
        font-size: 1rem;
        line-height: 25px;
        /* color: #262626; */
        padding-top: 30px;
        margin-left: 25px;
    }

    .main-section {
      margin: 25px auto;
      width: 80%;
    }
    }

    @media (max-width: 400px){
      #glac h1 {
        /* font-family: Ubuntu; */
        /* font-style: normal; */
        /* font-weight: normal; */
        font-size: 1rem;
        line-height: 25px;
        /* color: #262626; */
        padding-top: 30px;
        margin-left: 25px;
    }

    .main-section {
      margin: 25px auto;
      width: 95%;
    }

    input {
    height: 35px;
    width: 60%;
    text-align: center;
    border: 1px solid;
    }

    select {
    border: none;
    border-bottom: 1px solid;
    font-size: 14px;
    }
    }



  </style>
 @endsection

@section('header')
<div id="containere">
        <div>
            <button class="close navM" ><a href="{{ url('/') }}"><span>
                    <i class="fa fa-times"></i>
                  </span></a></button>
        </div>
        <div>
            <p class="nav cEstimate" id="cre">Create Estimate</p>
        </div>
        <div>

            <input class="next disabled" id="ext" type="button"  value="NEXT" onclick="manage" id="btne" disabled>

        </div>
</div>
@endsection

@section('content')

  <div class="container-fluid main-section">

<form  method="POST" action="/guest/save/step2">
      @csrf
    <div id="word">
      <h1>Evaluation</h1>
      <h5>Please Input the required fields in the form below</h5><br>
    </div>



    <div class="section1">

      <div id="glac">
        <h1>{{ $project['title'] }}</h1>
        <hr />
      </div>
      <hr />

      <div id="bill">
        <h3>Billing</h3>

        <div class="hour">
          <p>How long (in hours) will it take you to complete this project?</p>

          <input type="text" name="time" placeholder="Hours" />
        </div>
        <div class="hour">

          <p>How much (in hours) do you charge per hour?</p>
          <input type="text" name="cost_per_hour" placeholder="NGN 0.00" />
        </div>



        <div class="hours">
          <p>Project starts/ends</p>
          <i class="fa fa-calendar start"><input type="text" onfocus="(this.type='date')" name="start"
              placeholder=" Set start date" /></i>
          <i class="fa fa-calendar end"><input type="text" onfocus="(this.type='date')" name="end"
              placeholder="Set end date" /></i>

        </div>

      </div>

      <hr />
      <div>
        <h3>Expenses</h3>
        <div class="hour">
          <p id="cost">
            How much would it cost you to power your devices or equipment for this
            project?
          </p>
          <input type="text"  name="equipment_cost" id="est1" placeholder="NGN 0.00" />
        </div>


        <div class="hour">
          <p id="sub">Are you subcontracting to anyone?</p>
          <input type="text" nname="sub_contractors" id="est2" placeholder="E.g. Illustrator, Consulting..." class="sub"/>
        </div><br />

        <div class="hour">
          <p id="pay">How much would they be paid?</p>
          <input type="text" name="sub_contractors_cost" id="est3" placeholder="NGN 0.00" />
        </div>
      </div>
      <br>
      <div>
        <h3>Expertise</h3>

        <div class="hour">
          <p id="proj">How many similar projects have<br>you done before?</p>
          <input type="text" name="similar_projects" id="exp1">

        </div>


        <div class="hour">
          <p id="rate">Out of 5 how would you rate your<br>experience level in executing this <i class="fa fa-question-circle" aria-hidden="true"></i><br>project?<p>
              <input type="text" name="rating" id="exp2"> /5
        </div>

      </div>
      <hr />


      <div id="currency">
        Currency:<select name="currency_id">
         <option value="">
         Select Currency
         </option>
          @foreach($currencies as $currency)
          <option value="{{$currency->id}}">{{$currency->code}}</option>
          @endforeach
        </select>

      </div>



    </div >

    <button class="btn next" type="submit">NEXT</button>
  </form>
    </div>

  </div>
@endsection

@section('script')
    
<script>
        function verifyPath() {
        let a_next =  document.querySelector('.a-next');
        let next = document.querySelector('.next');
        let bt = document.getElementById('btne');


        
        if (createProject.value !== "" && createProject.value.length >= 4 ) {
             a_next.style.background = '#0ABAB5';
             next.style.background = '#0ABAB5';
              bt.disabled = false;


            document.querySelector('.a-next').classList.remove('disabled');
            document.querySelector('.next').classList.remove('disabled');
        } else {

            //console.log('here works');
            document.querySelector('.next').style.background = 'rgba(207, 204, 204, 0.4)';
            document.querySelector('.next').classList.add('disabled');
            document.querySelector('.a-next').style.background = 'rgba(207, 204, 204, 0.4)';
            document.querySelector('.a-next').classList.add('disabled');
             bt.disabled = true;
              bt.preventDefault();
            
            
             
        }
    }
    
    let createProject = document.getElementById('createProject');
    window.onload=function(){
         createProject.addEventListener('keyup', verifyPath);
    }
   

     function manage(createProject) {
        let bt = document.getElementById('btne');
        if (createProject.value != '') {
            bt.disabled = false;
        }
        else {
            bt.disabled = true;
             bt.preventDefault(); 
        }
    }    
    </script>