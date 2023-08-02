<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style1.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>تسجيل حساب </title>



</head>

<body>
    <div class="container">
        <header>تسجيل حساب</header>

        <form action="{{ route('store_affilate') }}" method="POST" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <span class="title">معلومات عن المتجر</span>

                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                    <div class="fields">
                        <div class="input-field">
                            <label>الاسم</label>
                            <input name='affiliate_first_name' type="text" placeholder="أكتب الاسم" required>
                        </div>
                        <div class="input-field">
                            <label>اللقب</label>
                            <input name="affiliate_last_name" type="text" placeholder="أكتب اللقب" required>
                        </div>



                        <div class="input-field">
                            <label>الأميل</label>
                            <input name='affiliate_email' type="email" placeholder="أكتب الاميل" required>
                        </div>
                        <div class="input-field">
                            <label>العنوان</label>
                            <input name='affiliate_address' type="text" placeholder="أكتب البريد الألكتروني"
                                required>
                        </div>

                        <div class="input-field">
                            <label>رقم الهاتف</label>
                            <input name='phone_number' type="text" placeholder="أكتب رقم الهاتف" required>
                        </div>


                        <div class="details ID">
                            <span class="title">وسيلة الدفع</span>

                            <div class="fields">


                                <div class="input-field">
                                    <label>أفضل وسيلة دفع بالنسبة لك ؟ </label>
                                    <input name='preferred_payment_method' type="text"
                                        placeholder="أكتب أفضل وسيلة دفع بنسة لك" required>
                                </div>



                                <div class="input-field">
                                    <label>اسم المرسل</label>
                                    <input name='sender_name' type="text" placeholder="أكتب اسم المرسل" required>
                                </div>

                                <div class="col-xxl-12 col-md-12 mb-4">
                                    <div class="file-drop-area">
                                        <br>

                                        <span class="choose-file-button">أرفع الشعار الخاص بالمتجر </span>
                                        <span class="file-message">أرفع الصور الخاصة بمتجرك</span>
                                        <br>
                                        <br>
                                        <input type="file" name="image"class="file-input"
                                            accept=".jfif,.jpg,.jpeg,.png,.gif" required multiple>

                                    </div>

                                    <div id="divImageMediaPreview">

                                    </div>
                                </div>


                            </div>

                            <button>
                                <span class="submit" type='submit'> تأكيد</span>

                            </button>
                        </div>
                    </div>


        </form>
    </div>

    <script></script>
</body>

</html>