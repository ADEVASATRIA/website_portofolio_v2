<script setup>
    import axios from 'axios';
    import Base from '../layouts/base.vue'
    import { onMounted, ref } from 'vue';

    let skills = ref([])

    onMounted(async () => {
        getSkills()
    })

    const getSkills = async () => {
        let response = await axios.get('/api/get_all_skill')
        //console.log('response', response)
        skills.value = response.data.skills
    }
</script>

<template>
        <Base/>
        <main class="main">
            <div class="main__sideNav"></div>
            <!-- Main Content -->
            <div class="main__content">
                            <!--==================== SKILLS ====================-->
            <section class="skills section" id="skills">
                <div class="skills_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Skills </h1>
                        </div>
                        <div class="titlebar_item">
                            <div class="btn btn__open--modal">
                                New Skill
                            </div>
                        </div> 
                    </div>

                    <div class="table">

                        <div class="table_filter">
                            <span class="table_filter-Btn ">
                                <i class="fas fa-ellipsis-h"></i>
                            </span>
                            <div>
                                <ul class="table_filter-list">
                                    <li>
                                        <p class="table_filter-link table_filter-link--active">
                                            All
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
            
                        <div class="table_search">
                            <div class="table_search-wrapper">
                                <select class="table_search-select" name="" id="">
                                    <option value="">Filter</option>
                                </select>
                            </div>
                            <div class="relative">
                                <i class="table_search-input--icon fas fa-search "></i>
                                <input class="table_search--input" type="text" placeholder="Search Skill">
                            </div>
                        </div>
            
                        <div class="skill_table-heading">
                            <p>Name</p> 
                            <p>Proficiency</p>
                            <p>Service</p>
                            <p>Actions</p>
                        </div>
                        <!-- item 1 -->
                        <div class="skill_table-items" v-for="item in skills" :key="item.id" v-if="skills.length > 0">
                            <p>{{ item.name }}</p>
                            <div class="table_skills-bar">
                                 <span class="table_skills-percentage"  :style="{'width' : `${item.proficiency}%`}"></span>
                                 <strong>{{item.proficiency}}%</strong>
                                 
                            </div>
                            <p v-if="item.service && item.service.name">{{ item.service.name }}</p>
                        <div>
                            <button class="btn-icon success">
                                <i class="fas fa-pencil-alt">

                                </i>
                            </button>
                            <button class="btn-icon danger">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                            <!-- <div>
                                <button class="btn-icon success">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn-icon danger" >
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div> -->
                        </div>

                    </div>
                    
                </div>
                <!-------------- SERVICES MODAL --------------->
                <div class="modal main__modal " >
                    <div class="modal__content">
                        <span class="modal__close btn__close--modal" >×</span>
                        <h3 class="modal__title">Add Skill</h3>
                        <hr class="modal_line"><br>
                        <div>
                            <p>Name</p>
                            <input type="text" class="input" />

                            <p>Proficiency</p>
                            <input type="text" class="input" />
                           
                            <p>Service</p>
                            <select class="inputSelect" name="" id="">
                                <option value="">Front-end developer</option>
                                <option value="">Backend developer</option>
                            </select>
                        </div>
                        <br><hr class="modal_line">
                        <div class="model__footer">
                            <button class="btn mr-2 btn__close--modal" @click="closeModal()">
                                Cancel
                            </button>
                            <button class="btn btn-secondary btn__close--modal ">Save</button>
                        </div>
                    </div>
                </div>
            </section>
            </div>
        </main>
</template>