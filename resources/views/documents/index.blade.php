@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <ul class="nav flex-column nav-pills">
        <li class="nav-item">
          <form method="POST" id="submit_form" action="{{ route('documents.store') }}" enctype=multipart/form-data>
            @csrf
            <!-- <input class="nav-link" type="file" name="doc_file" id="document_file_upload" >          -->
            <div class="d-flex align-items-center justify-content-between">
              <div>FILES</div>
              <div class="form-group inputFile">
                <label for="file" id="filee">
                Upload
                  <img src="{{ asset('images/icon-upload.png')}}" alt="" class="iconUpload me-2 align-self-center"
                    width="15" height="16" >
                  
                </label>
                <input type="file" name="doc_file" id="file" accept="application/pdf"/>
              </div>
            </div>


        </li>
      </ul>
      <?php //print_r($documents); 
      //die();?>
      <!-- Vertical Tabs -->
      <ul class="nav flex-column nav-pills">
        <?php foreach($documents as $key => $document) { ?>

        <li class="nav-item">
          <a class="nav-link <?php if($key ==0){ echo 'active'; } ?>" id="tab<?php echo $key+1; ?>"
            onclick="openPDF('tab_<?php echo $key+1; ?>','tab<?php echo $key+1; ?>')" data-toggle="pill"
            href="#pdf<?php echo $key+1; ?>">#Document_
            <?php echo $key+1; ?>
          </a>
        </li>
        <?php } ?>
      </ul>
    </div>

    <div class="col-md-9">
      <!-- Tab Content -->
      <div class="tab-content">
        <?php foreach ($documents as $key => $document) { ?>
        <div class="tab-pane fade <?php if($key ==0){ echo 'show active'; } ?>" id="pdf<?php echo $key+1; ?>">

          <iframe id="tab_<?php echo $key+1; ?>" src="{{ asset('pdf') }}/{{ $document->file}}" width="100%"
            height="600px"></iframe>
        </div>
        <?php } ?>

      </div>
    </div>
  </div>
</div>

@endsection