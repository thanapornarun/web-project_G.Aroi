<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
    วิธีติดตั้ง
    1. clone [repo](https://github.com/thanapornarun/web-project_G.Aroi/tree/wk) ลงมาที่เครื่องคอมพิวเตอร์ที่ต้องการใช้งาน
    2. เปิด wsl และเริ่มเปิดเว็บไซต์ด้วย sail up -d (สามารถดูวิธีการติดตั้ง Laravel Sail ได้ที่ https://laravel.com/docs/10.x/sail#installing-composer-dependencies-for-existing-projects )
    3. รัน command `sail yarn dev` *ต้องรันทุกครั้งไม่อย่างงั้นจะใช้ web ไม่ได้
    4. ใช้งานเว็บตามปกติ

    ตัวอย่างการใช้งาน
    user ทั่วไป ( user ที่มี account เป็นของตัวเองและ Login เข้ามาสู่ระบบ ) สามารถ
        1. สามารถตรวจสอบจากแถบ My Event ตัวเองมี event อะไรที่บ้าง ( เป็น event ที่ user เป็นคนสร้างเอง )
        2. สามารถตรวจสอบจากแถบ Event Joined ตัวเองมี event อะไรที่เข้าร่วมไปแล้วบ้าง
        3. สามารถตรวจสอบจากแถบ My Profile เพื่อตรวจ Profile ของ user
        4. สามารถสร้าง event เพิ่มจาก Create Event
        5. สามารถเข้าร่วม event ได้จากการที่กดเข้าไปที่หน้า Event ที่อยากจะเข้าร่วม ข้างล่างสุด จะมีปุ่ม Join เมื่อกด ระบบจะพาไปหน้า JoinSuccesse
        6. สามารถเปลื่ยนข้อมูล Profile ของตัวเองได้ที่ My Profile > edit profile และกรอกข้อมูลลงไป
    user ที่มี role เป็นเจ้าของ event สามารถตรวจ
        1. สามารถเพิ่มสตาฟ และหน้าที่อื่น ๆ ภายใน event ได้ด้วยการกดที่ My Event > Team และเลือกชื่อ user และ role ที่ต้องการ ( สถานะผู้เข้าร่วมของ user ที่เจ้าของ event เป็นคนตั้งให้จะเป็น ผ่าน เสมอ )
        2. สามารถตรวจสอบงบประมาณและค่าใช้จ่ายต่าง ๆ ของ event ได้ด้วยการกดที่ My Event > Budget
        3. สามารถให้ user เลือกสถานะของผู้เข้าร่วม ( user ที่กด join event ) ว่าผ่าน หรือไม่ผ่าน
</p>
