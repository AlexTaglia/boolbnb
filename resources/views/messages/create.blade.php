<section class="get-in-touch">
   <h1 class="title">Contact Us</h1>
            <form class="contact-form row" action="{{route('messages.store')}}" method='post' enctype="multipart/form-data">
                @csrf
                <div class="form-field col-lg-6">
                    <label for="sender_name" class="label pb-2">{{$apartment->title}}</label>
                    <input class="input-text js-input"  name="apartment_id" id="apartment_id" maxlength="255" value="{{ $apartment-> id }}" readonly>
                </div>
                <div class="form-field col-lg-6">
                    <label for="sender_name" class="label pb-2">Inserire il nome:</label>
                    <input class="input-text js-input" type="text" name="sender_name" id="sender_name" maxlength="255">
                </div>
                <div class="form-field col-lg-6">
                    <label for="email" class="label pb-2">Inserire l email:</label>
                    <input class="input-text js-input" type="text" name="email" id="email" maxlength="255">
                </div>
                <div class="form-field col-lg-6">
                    <label for="text" class="label pb-2">Inserire il messaggio:</label>
                    <textarea class="input-text js-input" type="text" name="text" id="text" maxlength="255"></textarea>
                </div>
                <div class="form-field col-lg-12">
                    <input class="submit-btn" type="submit" value="Submit">
                </div>
            </form>
</section>