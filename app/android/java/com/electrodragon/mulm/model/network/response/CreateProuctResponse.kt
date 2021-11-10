package com.electrodragon.mulm.model.network.response

import com.electrodragon.mulm.model.network.constant.ApiResponseConstant
import com.google.gson.annotations.SerializedName

data class CreateProuctData (
        @SerializedName(ApiResponseConstant.EXCEPTIONS) val exceptions: CreateProuctResponseClasses.Exceptions?,
        @SerializedName("attribute_name") val attributeName: Boolean?
)

object CreateProuctResponseClasses {
    data class Exceptions(
        @SerializedName(ApiResponseConstant.MISSING_PARAM) val missingParam: String?,
        @SerializedName(ApiResponseConstant.INVALID_VALUE_OF_PARAM) val invalidValueOfParam: String?
        @SerializedName("some_exception_name") val exceptionName: Boolean?
    )
}
