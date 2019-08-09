<template>
    <div class="salary-index">
        <div class="toolbar"></div>
        <div class="checklist container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Bảng chấm công tháng {{month}}</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="info">
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="week, index in calendar">
                                <td v-for="day, indexx in week" v-bind:class="day&&day.value==0?'bg-danger':(day&&day.value==3?'bg-success':(day&&(day.value==1||day.value==2)?'bg-warning':'bg-primary'))">
                                    {{day?day.date:""}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <h4>Thống kê</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Số ngày làm</th>
                                <th>Bonus dự án</th>
                                <th>Lương đã tích lũy</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="info">
                                <td>{{salary.day_worked}}</td>
                                <td>{{salary.bonus_project}}</td>
                                <td>$ {{salary.total}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            salary: {
                
            },
            calendar: [],
            checklist: {},
            month: new Date().getMonth() + 1
        }
    },
    mounted(){
        axios.get(laroute.route('salary.me'))
            .then(res => {
                this.salary = res.data
                this.checklist = JSON.parse(this.salary.checklist)
                let today = new Date();
                let begin = new Date(today.getFullYear(),today.getMonth(),1).getDay();
                let start = 1;

                let dayInWeek = 0;
                let week = 1;
                let temp = [];
                let count = 0;
                //Init first week
                while(start != begin){
                    temp.push(null)
                    start++;
                    dayInWeek++;
                }
                for(let index in this.checklist){
                    temp.push({
                        date: count+1,
                        value: this.checklist[index]
                    })
                    count++
                    dayInWeek++
                    if(dayInWeek == 7 || count == Object.keys(this.checklist).length){
                        if(dayInWeek < 7){
                            for(let i = 0; i < 7 - dayInWeek; i++){
                                temp.push(null)
                            }
                        }
                        dayInWeek = 0
                        this.calendar.push(temp);
                        temp = []
                    }
                }
            })
            .catch(err => {
                console.log(err)
            })
    }
}
</script>
