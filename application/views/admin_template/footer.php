<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>   
<script>
    $('.xulydonhang').change(function(){
        const value=$(this).val();
        const order_code=$(this).find(':selected').attr('id');
        
        if(value==1){
            alert('Bạn chưa chọn');
        }
        else{
            $.ajax({
                method:'POST',
                url:'/order/process',
                data:{value:value,order_code:order_code},
                success:function(){
                    alert('Thay đổi thuộc tính đơn hàng thành công');   
                  
                }
                

            })

            
        }
    })
</script>
</body>
</html>