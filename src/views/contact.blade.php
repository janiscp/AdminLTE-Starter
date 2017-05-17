@extends('adminlte::layouts.crud')
<meta id="token" name="token" value="{{ csrf_token() }}">


@section('content')
    <section class="content-header">
    <h1>
        Contact
        <small>Optional description</small>
    </h1>

    <ol class="breadcrumb">
        <!--li><a href="#"><i class="fa fa-dashboard"></i> </a></li-->
        <li class="active">Home</li>
    </ol>
    </section>

    <section class="content">
        <div id="manage-vue">

        <div class="form-group row add">
            <div class="col-md-12">
            <button type="button" data-toggle="modal" data-target="#create-item" class="btn btn-primary">
            Create New Contact
            </button>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
            <table class="table table-borderless">
                <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact #s</th>
                <th>Actions</th>
                </tr>
                <tr v-for="item in items">
                <td>@{{ item.first_name }}</td>
                <td>@{{ item.last_name }}</td>
                <td>@{{ item.contact_nos }}</td>
                <td>
                    <button class="edit-modal btn btn-warning" @click.prevent="editItem(item)">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                    </button>
                    <button class="edit-modal btn btn-danger" @click.prevent="deleteItem(item)">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                    </button>
                </td>
                </tr>
            </table>
            </div>
        </div>

        <nav>
            <ul class="pagination">
            <li v-if="pagination.current_page > 1">
            <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
                <span aria-hidden="true">«</span>
            </a>
            </li>
            <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
            <a href="#" @click.prevent="changePage(page)">
                @{{ page }}
            </a>
            </li>
            <li v-if="pagination.current_page < pagination.last_page">
            <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)">
                <span aria-hidden="true">»</span>
            </a>
            </li>
            </ul>
        </nav>

        <!-- Create Item Modal -->
        <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Create New</h4>
                </div>
                <div class="modal-body">
                <form method="post" enctype="multipart/form-data" v-on:submit.prevent="createItem">
                    <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" class="form-control" v-model="newItem.first_name" />
                    <span v-if="formErrors['first_name']" class="error text-danger">
                        @{{ formErrors['first_name'] }}
                    </span>
                    </div>
                    <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" class="form-control" v-model="newItem.last_name" />
                    <span v-if="formErrors['last_name']" class="error text-danger">
                        @{{ formErrors['last_name'] }}
                    </span>
                    </div>
                    <div class="form-group">
                    <label for="contact_nos">Contact #:</label>
                    <textarea name="contact_nos" class="form-control" v-model="newItem.contact_nos">
                    </textarea>
                    <span v-if="formErrors['contact_nos']" class="error text-danger">
                        @{{ formErrors['contact_nos'] }}
                    </span>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        <!-- Edit Item Modal -->
        <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit</h4>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" class="form-control" v-model="fillItem.first_name" />
                    <span v-if="formErrorsUpdate['first_name']" class="error text-danger">
                    @{{ formErrorsUpdate['first_name'] }}
                    </span>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" class="form-control" v-model="fillItem.last_name" />
                    <span v-if="formErrorsUpdate['last_name']" class="error text-danger">
                    @{{ formErrorsUpdate['last_name'] }}
                    </span>
                </div>
                <div class="form-group">
                    <label for="contact_nos">Contact #:</label>
                    <textarea name="contact_nos" class="form-control" v-model="fillItem.contact_nos">
                    </textarea>
                    <span v-if="formErrorsUpdate['contact_nos']" class="error text-danger">
                    @{{ formErrorsUpdate['contact_nos'] }}
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </section>
@endsection


@section('yield_ext_scripts')
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.min.js"></script>
  <script type="text/javascript" src="/js/contact.js"></script>
@endsection


@section('yield_int_scripts')
@endsection