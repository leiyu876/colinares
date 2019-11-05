<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Just an example of vue, you can delete this if you want<br/>
                        Important Note : save partial data into array of vue objects and can final submit to backend php
                    </div>
                    
                    <div class="panel-body">      

                        <h3>Straigh Forward Calling</h3>
                        <p>{{ title }}</p>
                        <hr>

                        <h3>Adding to an array of strings</h3>
                        <input type="text" v-model="item">{{item}}<button v-on:click="addnew">Add new</button>
                        <ul v-for="item in items">
                            <li>{{ item }}</li>
                        </ul>
                        <hr>

                        <h3>Adding to an array of Objects</h3>
                        <input type="text" v-model="itemobj">{{itemobj}}<button v-on:click="addnewobj">Add new</button>
                        <ul v-for="item in itemsobj">
                            <li>{{ item }}</li>
                        </ul>
                        <hr>
                        
                        <br/>
                        Input Anything : <input type="text" v-model="inputanything">                        
                        <button @click="submitpartial">Add to List</button>
                        <button @click="submitfinal">Submit all to backend PHP</button>
                        <ul>
                            <li v-for="item in myarray">{{ item }}</li>
                        </ul>

                    </div>                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            
        },
        props: {
            formpost: ''
        },

        data() {
            return {
                title: 'Example Best',
                kinsa: 'leo',
                item: '',
                items: [
                    'leo',
                    'taudhid'
                ],

                itemobj: '',
                itemsobj: [
                    {name:'leo'},
                    {name:'taudhid'}
                ],

                inputanything:'',                
                myarray: [
                    'leo',
                    'taudhid'
                ]
            }
        },
        methods: {
            
            addnew: function() {
                this.items.push(this.item)
            },
            
            addnewobj: function() {
                let newobj = {
                    name : this.itemobj
                }
                this.itemsobj.push(newobj)
            },            
            
            submitpartial : function () {
                this.myarray.push(this.inputanything)
            },

            submitfinal : function () {
                axios.post(this.formpost, this.myarray)
                .then(res => {
                    //console.log(res.data)
                    this.myarray = res.data
                }).catch(err => {
                    console.log(err)
                })
            }
        }      
    }
    
</script>
