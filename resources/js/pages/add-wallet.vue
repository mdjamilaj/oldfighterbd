<template>
  <div class="container mx-auto w-full md:w-6/12 xl:w-6/12 p-2 md:p-0">
    <h1
      class="
        text-center text-2xl
        lg:text-4xl
        text-teal-500
        font-extrabold
        mt-2
        lg:mt-8
        mb-2
        lg:mb-6
      "
    >
      Add Money
    </h1>
    <div class="justify-center shadow-lg hover:shadow-xl border-2 p-4 lg:p-8">
      <div
        class="
          grid grid-cols-2
          sm:grid-cols-2
          md:grid-cols-4
          lg:grid-cols-4
          gap-8
        "
      >
        <div v-for="(payment_method, i) in paymentMethods" :key="i">
          <input
            :id="'ckb_' + payment_method.id"
            type="radio"
            checked
            name="foo"
            style="display: none"
          />
          <label :for="'ckb_' + payment_method.id">
            <div
              @click="paymentMethod = payment_method.id"
              class="
                border-2
                cursor-pointer
                border-gray-300
                items-center
                text-center
                rounded-lg
                p-3
                focus:bg-red-300
                focus:outline-none
                focus:shadow-outline
              "
              style="height: 100%;"
            >
              <img
                v-if="payment_method && payment_method.logo"
                :src="'/paymentMethod/' + payment_method.logo"
                alt=""
                class="w-24 mx-auto"
              />
              <h4
                v-if="payment_method && payment_method.name"
                class="text-base font-bold text-red-300"
              >
                {{ payment_method.name }}
              </h4>
            </div>
          </label>
        </div>
      </div>
      <div class="mt-5 border-2 border-gray-600 shadow-xl p-5 text-center">
        <div v-for="(payment_method, i) in paymentMethods" :key="i">
          <div v-if="paymentMethod == payment_method.id">
            <img
              v-if="payment_method"
              :src="'/paymentMethod/' + payment_method.logo"
              alt=""
              class="w-24 mx-auto"
            />
            <h5 v-if="payment_method" class="text-base font-bold">
              Our {{ payment_method.name }} number:
              <b class="text-red-300">{{ payment_method.number }}</b>
            </h5>
            <p
              class="
                text-white text-center
                bg-red-300
                hover:bg-pink-500
                text-white
                font-bold
                py-2
                px-2
                rounded
                w-56
                mx-auto
                mt-2
              "
            >
              How to add money?
            </p>
              <div class="my-3 mt-3" style="font-family: auto;width:100%;text-align-center;">
                 <span v-html="payment_method.description"></span>
              </div>
              <span class="my-3 mt-3" style="font-family: auto">
              <b>Almost Done. Now follow Step 2:</b><br />
              <span
                >এখন Amount To Add ফিল্ডয়ে আমাদের নাম্বাররে প্রেরিত টাকার পরিমান
                লিখুন <br />
                সর্বশেষ Sender Number ফিল্ডয়ে আপনি যে নাম্বার থেকে টাকা
                পাঠিয়েছেন সেটা লিখে Add Wallet বাটনে Click করুন
              </span>
              <h6 class="text-red-500">
                ৩০ মিনিটের মধ্যে আপনার ওয়ালেটে টাকা Add হয়ে যাবে
              </h6>
            </span>
          </div>
        </div>
        <div class="mt-5">
          <h4 class="font-bold text-base">Amount To Add</h4>
          <input
            v-model="amount"
            required
            type="number"
            placeholder="Amount To Add"
            class="
              p-2
              class-manual-width
              bg-white
              hover:bg-gray-100
              hover:border-gray-300
              border-lg border-gray-500 border-2
              focus:outline-none
              focus:bg-white
              focus:shadow-outline
              focus:border-gray-300
            "
          />
          <p v-if="amount === ''" class="text-pink-700">Amount is required</p>
          <p v-else-if="amount < 10" class="text-pink-700">
            Must be between 10 and 90000
          </p>
          <p v-else-if="amount >= 90000" class="text-pink-700">
            Must be between 10 and 90000
          </p>
        </div>
        <div class="">
          <h4 class="font-bold text-base">Sender Number</h4>
          <input
            type="number"
            v-model="paymentNumber"
            required
            placeholder="Sender Number"
            class="
              p-2
              class-manual-width
              bg-white
              hover:bg-gray-100
              hover:border-gray-300
              border-lg border-gray-500 border-2
              focus:outline-none
              focus:bg-white
              focus:shadow-outline
              focus:border-gray-300
            "
          />
          <p v-if="paymentNumber === ''" class="text-pink-700">
            Sender Number is required
          </p>
        </div>
        <button
          @click="addAmount()"
          class="
            text-white
            class-manual-width
            text-center
            bg-pink-500
            hover:bg-pink-800
            text-white
            font-bold
            py-2
            px-2
            rounded
            w-56
            mx-auto
            mt-3
          "
        >
          Add Wallet
        </button>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import Swal from "sweetalert2";
import { mapGetters } from "vuex";
export default {
  computed: mapGetters({
    user: "auth/user",
    check: "auth/check",
  }),
  data() {
    return {
      paymentMethod: 1,
      paymentNumber: "",
      amount: "",
      transactionid: "",
      paymentMethods: [],
    };
  },
  methods: {
    addAmount() {
      if (this.check == false) {
        Swal.fire({
          type: "warning",
          title: "You are not login user",
          html: "<p style='color: red;'>Login first to add wallet</p>",
          reverseButtons: true,
          confirmButtonText: "ok",
        });
      } else {
        var params = {
          paymentMethod: this.paymentMethod,
          transactionid: this.transactionid,
          paymentNumber: this.paymentNumber,
          amount: this.amount,
        };
        axios
          .post(`/api/add-wallet/${this.user.id}`, params)
          .then((response) => {
            if (response.data == "true") {
              if (response.data.length > 0) {
                this.paymentMethod = this.paymentMethods[0].id;
              }
              this.paymentNumber = "";
              this.amount = "";
              Swal.fire({
                type: "success",
                title: "Request sent successfully !",
                html: "<p style='color: green;'>Your request has been successfully sent</p>",
                reverseButtons: true,
                confirmButtonText: "ok",
              });
            } else {
              Swal.fire({
                type: "error",
                title: "Order Send Failed",
                html: "<p style='color: red;'>You Have A Pending Request. Please Completed it Before Make Another</p>",
                reverseButtons: true,
                confirmButtonText: "ok",
              });
            }
          });
      }
    },
    loadPaymentMethod() {
      axios.get("/api/paymentMethods").then((response) => {
        this.paymentMethods = response.data;
        if (response.data.length > 0) {
          this.paymentMethod = response.data[0].id;
        }
      });
    },
  },
  created() {
    this.loadPaymentMethod();
  },
};
</script>

<style scoped>
input:checked + label {
  background: #9a309e;
  border-radius: 10px;
}
.class-manual-width {
  width: 25rem;
}
@media only screen and (max-width: 475px) {
  .class-manual-width {
    width: 100%;
  }
}
</style>
