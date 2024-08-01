import MobileScreenShareIcon from '@material-ui/icons/MobileScreenShare';
import DevicesIcon from '@material-ui/icons/Devices';
import PeopleAltOutlinedIcon from '@material-ui/icons/PeopleAltOutlined';
import QueryBuilderOutlinedIcon from '@material-ui/icons/QueryBuilderOutlined';
import StarBorderOutlinedIcon from '@material-ui/icons/StarBorderOutlined';
import DeleteOutlineOutlinedIcon from '@material-ui/icons/DeleteOutlineOutlined';
import CloudQueueIcon from '@material-ui/icons/CloudQueue';
import styled from 'styled-components'

const SidebarContainer = styled.div``
const SidebarBtn = styled.div``
const SidebarOptions = styled.div``

const Sidebar = () => {
    return(
        <SidebarContainer>
            <SidebarBtn>
                <button>
                    <img src="data:image/svg+xml;charset=UTF-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2236%22 height=%2236%22 viewBox=%220 0 36 36%22%3E%3Cpath fill=%22%2334A853%22 d=%22M16 16v14h4V20z%22/%3E%3Cpath fill=%22%234285F4%22 d=%22M30 16H20l-4 4h14z%22/%3E%3Cpath fill=%22%23FBBC05%22 d=%22M6 16v4h10l4-4z%22/%3E%3Cpath fill=%22%23EA4335%22 d=%22M20 16V6h-4v14z%22/%3E%3Cpath fill=%22none%22 d=%22M0 0h36v36H0z%22/%3E%3C/svg%3E"/>
                <span>New</span>
                </button>
            </SidebarBtn>
            <SidebarOptions>
                <div class="option option-active">
                    <MobileScreenShareIcon/><span>My Folders</span>
                </div>
                <div class="option">
                    <PeopleAltOutlinedIcon/><span>Shared with me</span>
                </div>
                <div class="option">
                    <QueryBuilderOutlinedIcon/><span>Recent</span>
                </div>
                <div class="option">
                    <StarBorderOutlinedIcon/><span>Starred</span>
                </div>
                <div class="option">
                    <DeleteOutlineOutlinedIcon/><span>Trash</span>
                </div>
            </SidebarOptions>
        </SidebarContainer>
    )
}

export default Sidebar;