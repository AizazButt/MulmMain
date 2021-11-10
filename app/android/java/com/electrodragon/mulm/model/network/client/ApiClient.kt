package com.electrodragon.mulm.model.network.client

import com.electrodragon.mulm.model.network.service.*

class ApiClient(
    val createProuctService: CreateProuctService,
    val helloWorldService: HelloWorldService
)
