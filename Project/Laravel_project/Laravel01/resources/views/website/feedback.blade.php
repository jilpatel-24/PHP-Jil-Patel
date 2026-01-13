@extends ('website.layout.structure')

@section('content')

    <style>
    body {
        background-color: #f8f9fa;
        font-family: 'Poppins', sans-serif;
    }

    /* Added this ↓ */
    .contact-section {
        min-height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 120px 20px 60px 20px; /* top padding increased to 120px */
    }

    .card {
        max-width: 700px;
        width: 100%;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
        background-color: #fff;
    }

    .card h3 {
        margin-bottom: 25px;
        font-weight: 600;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    footer {
        margin-top: 50px;
    }
</style>



    <!-- ======= Contact Section ======= -->
     
    <section class="contact-section">
        <div class="card">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

            @if(session('success'))
            <h3 style="color:green" class="float-end m-3">{{session('success')}}</h3>
            @endif
            <h3 class="text-center">Feedback Form</h3>
            <form action="{{url('/add_feedback')}}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label>Book Name</label>
                    <input type="text" value="{{old('name')}}" class="form-control" name="name" placeholder="Enter your Book Name" >
                </div>
                <div class="form-group mb-3">
                    <label>Comment</label>
                    <textarea class="form-control" value="{{old('comment')}}" name="comment" rows="4" placeholder="Write your comment..." ></textarea>
                </div>
                <button  name="submit" type="submit" class="btn btn-primary w-100">Send Feedback</button>

                
            </form>
        </div>
    </section>

   @endsection