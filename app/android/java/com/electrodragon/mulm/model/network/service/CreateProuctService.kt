package com.electrodragon.mulm.model.network.service

import com.electrodragon.mulm.model.network.constant.ApiRequestConstant
import com.electrodragon.mulm.model.network.response.CreateProuctData
import com.electrodragon.mulm.model.network.core.ElectroResponse
import retrofit2.Call
import retrofit2.http.Field
import retrofit2.http.FormUrlEncoded
import retrofit2.http.POST

interface CreateProuctService {
    @FormUrlEncoded
    @POST("create_prouct.php")
    fun createProuct(
            @Field(ApiRequestConstant.API_KEY) api_key: String,
    ): Call<ElectroResponse<CreateProuctData>>
}
