@extends("admins.app")
@section("content")
<style type="text/css">
 #scrolly{
            overflow-x: scroll;
            margin: 0 auto;
            white-space: nowrap;
        }

    /*arbre généalogique début*/
.tree ul {
	padding-top: 20px;
	position: relative;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}
.tree li {
	float: left;
	text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
	transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 1px solid #ccc;
	width: 50%; height: 20px;
}
.tree li::after{
	right: auto; left: 50%;
	border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
	border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}

.tree li a{
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	color: #666;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	display: inline-block;

	border-radius: 5px;

	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
	transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after,
.tree li a:hover+ul li::before,
.tree li a:hover+ul::before,
.tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
}

/*arbre généalogique fin*/
</style>

<div class="my-3 p-3 bg-body rounded shadow-sm" id="scrolly">
  <h3 class="border-bottom pb-2 mb-3">Arbre Généalogique des Categories</h3>
    <div class="d-flex justify-content-end mb-2"><a href="{{route('admins.listCategorie')}}" class="btn btn-primary mb-3">Liste des Catégories</a></div>
  </br>
  @if(session()->has("successDelete"))
  <div class="alert alert-success">
    <h3>{{session()->get('successDelete')}}</h3>
  </div>
  @endif
  @if(session()->has("success"))
      <div class="alert alert-success">
        <h3>{{session()->get('success')}}</h3>
      </div>
    @endif
    <div class="tree">
            <ul class="nav">
                @foreach($first_categories as $categorie)
              <li> <a href="{{route('categories.edit', ['categorie'=>$categorie->id])}}">{{$categorie->libelle}}</a>
                <ul>
                    @foreach($categorie->children as $child)
                  <li> <a href="{{route('categories.edit', ['categorie'=>$child->id])}}">{{$child->libelle}}</a>
                    <ul>
                        @foreach($child->children as $child2)
                      <li> <a href="{{route('categories.edit', ['categorie'=>$child2->id])}}">{{$child2->libelle}}</a>
                        <ul>
                            @foreach($child2->children as $child3)
                            <li> <a href="{{route('categories.edit', ['categorie'=>$child3->id])}}">{{$child3->libelle}}</a>
                                <ul>
                                    @foreach($child3->children as $child4)
                                        <li> <a href="{{route('categories.edit', ['categorie'=>$child4->id])}}">{{$child4->libelle}}</a>
                                            <ul>
                                                @foreach ($child4->children as $child5)
                                                    <li> <a href="{{route('categories.edit', ['categorie'=>$child5->id])}}">{{$child5->libelle}}</a>
                                                        <ul>
                                                            @foreach ($child5->children as $child6)
                                                                <li><a href="{{route('categories.edit', ['categorie'=>$child6->id])}}">{{$child6->libelle}}</a>
                                                                    <ul>
                                                                        @foreach ($child6->children as $child7)
                                                                            <li><a href="{{route('categories.edit', ['categorie'=>$child7->id])}}">{{$child7->libelle}}</a>
                                                                                <ul>
                                                                                    @foreach ($child7->children as $child8)
                                                                                        <li><a href="{{route('categories.edit', ['categorie'=>$child8->id])}}">{{$child8->libelle}}</</a>
                                                                                            <ul>
                                                                                                @foreach ($child8->children as $child9)
                                                                                                    <li><a href="{{route('categories.edit', ['categorie'=>$child9->id])}}">{{$child9->libelle}}</a>
                                                                                                        <ul>
                                                                                                            @foreach ($child9->children as $child10)
                                                                                                                <li><a href="{{route('categories.edit', ['categorie'=>$child10->id])}}">{{$child10->libelle}}</a></li>
                                                                                                            @endforeach
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                        @endforeach
                    </ul>
                  </li>
                    @endforeach
                </ul>
              </li>
              @endforeach
            </ul>
    </div>
</div>
@endsection


