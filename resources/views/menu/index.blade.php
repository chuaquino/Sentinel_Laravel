@extends('layouts.app')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Menu List</h1>
    </div>
  </div>
  <div class="row">

    {{-- Success message  --}}
    @if(Session::has('alert-success'))
      <div class="alert alert-info"> {{Session::get('alert-success')}} </div>
    @endif

    <table class="table table-striped">
      <tr>
        <th>No.</th>
        <th>Menu Name</th>
        <th>Menu Description</th>
        <th>Menu Category</th>
        <th>Menu Price</th>
        <th>Menu Date</th>
        <th>Actions</th>
      </tr>
      <a href="{{route('menu.create')}}" class="btn btn-info pull-right">Add New Menu</a><br><br>
      <?php $no=1; ?>
      @foreach($menus as $menu)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$menu->menuName}}</td>
          <td>{{$menu->menuDesc}}</td>
          <td>{{$menu->menuCatName}}</td>
          <td>{{$menu->menuPrice}}</td>
          <td>{{$menu->menuDate}}</td>
          <td>
            <form class="" action="{{route('menu.destroy',$menu->id)}}" method="post">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <a href="{{route('menu.edit',$menu->id)}}" class="btn btn-primary">Edit</a>
              <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this menu');" name="menuName" value="delete">
            </form>
          </td>
        </tr>
      @endforeach
    </table>

    <table class="table table-striped table-condensed">
      <thead>
        <th>英語</th>
        <th>漢字</th>
        <th>カナ</th>
        <th>ローマ字</th>
      </thead>
      <tr>
        <td>Beef</td>
        <td>牛肉</td>
        <td>ぎゅうにく</td>
        <td>gyuuniku</td>
      </tr>
      <tr>
        <td>Chicken</td>
        <td>鶏肉</td>
        <td>とりにく</td>
        <td>toriniku</td>
      </tr>
      <tr>
        <td>Fish</td>
        <td>魚</td>
        <td>さかな</td>
        <td>sakana</td>
      </tr>
      <tr>
        <td>Milk</td>
        <td>牛乳</td>
        <td>ぎゅうにゅう</td>
        <td>gyuunyuu</td>
      </tr>
      <tr>
        <td>Oil</td>
        <td>油</td>
        <td>あぶら</td>
        <td>abura</td>
      </tr>
    </table>

    <div class="row">
      <div class="col-md-12">
        <h1>Posts</h1>
      </div>
    </div>

    <table class="table">
      <tr>
        <td></td>
        <td>
          DropDown
        </td>
        <td>
          DropDown
        </td>
        <td>
          DropDown
        </td>

        <td>
          <button type="button" class="btn btn-primary search_btn" aria-expanded="false">
            Search
          <span class="glyphicon glyphicon-search"></span>
    </button>
        </td>
      </tr>

      <tr>
        <th>No.</th>
        <th>Post Title</th>
        <th>Post Category</th>
        <th>Published Date</th>
        <th>Actions</th>
      </tr>
      <a href="{{route('menu.create')}}" class="btn btn-info pull-right">Write New Post</a><br><br>
        <tr>
          <td>1</td>
          <td>Asukayama Park</td>
          <td>Travel Blog</td>
          <td>2017 / 03 / 25</td>
          <td>
            <form class="" action="" method="post">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="">
              <a href="" class="btn btn-primary">Edit</a>
              <input type="submit" class="btn btn-danger" name="menuName" value="delete">
            </form>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Tsukiji Market</td>
          <td>Food Blog</td>
          <td>2017 / 04 / 01</td>
          <td>
            <form class="" action="" method="post">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="">
              <a href="" class="btn btn-primary">Edit</a>
              <input type="submit" class="btn btn-danger" name="menuName" value="delete">
            </form>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td>Chidorigafuchi</td>
          <td>Travel Blog</td>
          <td>2017 / 04 / 01</td>
          <td>
            <form class="" action="" method="post">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="">
              <a href="" class="btn btn-primary">Edit</a>
              <input type="submit" class="btn btn-danger" name="menuName" value="delete">
            </form>
          </td>
        </tr>
        <tr>
          <td>4</td>
          <td>A taste of Takoyaki</td>
          <td>Food Blog</td>
          <td>2017 / 04 / 01</td>
          <td>
            <form class="" action="" method="post">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="">
              <a href="" class="btn btn-primary">Edit</a>
              <input type="submit" class="btn btn-danger" name="menuName" value="delete">
            </form>
          </td>
        </tr>


    </table>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne" style="background-color:##337ab7;">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#electricity" aria-expanded="false" aria-controls="electricity">
              Electricity
            </a>
          </h4>
        </div>
        <div id="electricity" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            <br/><br/>
            <div class="well utilities"><h4>Tips for Electricity Usage</h4>
              <span class="glyphicon glyphicon-question-sign" style="font-size:16pt;"></span>
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
            </div>
            For more information please visit <a href="#">Tokyo Electric Power Company</a>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo" style="background-color:##337ab7;">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#gas" aria-expanded="false" aria-controls="gas">
              Gas
            </a>
          </h4>
        </div>
        <div id="gas" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="panel-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            <br/><br/>
            <div class="well utilities"><h4>Tips for Gas Usage</h4>
              <span class="glyphicon glyphicon-question-sign" style="font-size:16pt;"></span>
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
            </div>
            For more information please visit <a href="#">Tokyo Gas</a>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree" style="background-color:##337ab7;">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#water" aria-expanded="false" aria-controls="water">
              Water and Sewage
            </a>
          </h4>
        </div>
        <div id="water" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            <br/><br/>
            <div class="well utilities"><h4>Tips for Water and Sewage Usage</h4>
              <span class="glyphicon glyphicon-question-sign" style="font-size:16pt;"></span>
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
            </div>
            For more information please visit <a href="#">Bureau of Waterworks Tokyo Metropolitan Government</a>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree" style="background-color:##337ab7;">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#trash" aria-expanded="false" aria-controls="water">
              Trash Collection
            </a>
          </h4>
        </div>
        <div id="trash" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            <br/><br/>
              <table class="trash">
                <tr>
                  <td>
                    <img src="../img/combustible.jpg" class="trash_img"/><br/>
                    <span class="trash_title">Combustible</span>
                  </td>
                  <td>
                    <img src="../img/noncombustible.jpg" class="trash_img"/><br/>
                    <span class="trash_title">Non - Combustible</span>
                  </td>
                  <td>
                    <img src="../img/recyclable.jpg" class="trash_img"/><br/>
                    <span class="trash_title">Recyclable</span>
                  </td>
                </tr>
              </table>
              <br/>

              <span class="glyphicon glyphicon-time"></span>
              Each ward has different garbage collection schedule, kindly check at your designated ward. Generally all of your trash should be outside at 8 AM as per date collection.
          </div>
        </div>
      </div>
    </div>

    <!-- Consultation Schedule Table -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Ward</th>
          <th>Date</th>
          <th>Time</th>
          <th>Language</th>
          <th>Contact No.</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Adachi</td>
          <td>Mon.& Wed.</td>
          <td>9:00 - 11:00<br/>14:00 - 16:00</td>
          <td>English</td>
          <td>01-2345-5432</td>
        </tr>
        <tr>
          <td>Taito</td>
          <td>1st & 3rd Thu.</td>
          <td>10:00 - 12:00</td>
          <td>English<br/>Chinese</br>Korean</td>
          <td>01-2345-5432</td>
        </tr>
        <tr>
          <td>Meguro</td>
          <td>Mon. - Wed.</td>
          <td>9:00 - 11:00<br/>14:00 - 16:00</td>
          <td>English</td>
          <td>01-2345-5432</td>
        </tr>
        <tr>
          <td>Toshima</td>
          <td>Mon.& Wed.</td>
          <td>9:00 - 11:00<br/>14:00 - 16:00</td>
          <td>English<br/>Chinese</br>Korean</td>
          <td>01-2345-5432</td>
        </tr>
        <tr>
          <td>Shibuya</td>
          <td>Mon. - Wed.</td>
          <td>9:00 - 17:00</td>
          <td>English</td>
          <td>01-2345-5432</td>
        </tr>
      </tbody>
    </table>




  </div>

  @stop
