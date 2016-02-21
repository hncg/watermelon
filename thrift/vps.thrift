namespace php vps

exception SystemException {
	1: i32 code,
	2: string message
}

service Vps {
	i16 ping() throws (1:SystemException SysException)
}